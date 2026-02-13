<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;


#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string')]
    public string $member_id = '';

    #[Validate('required|string')]
    public string $password = '';
    
    public bool $remember = false;
    public function login(): void
    {
        $check = DB::table('members')->where('member_id_no', $this->member_id)->value('bal');
        if ($check != 0) {
            throw ValidationException::withMessages([
                'member_id' => 'Your membership is not in good standing. Please settle your dues to proceed.',
            ]);
        }

        $this->validate();

        $this->ensureIsNotRateLimited();

        // Fetch the user using id
        $user = User::where('id', $this->member_id)->first();

        // Check hashed password
        if (! $user || ! Hash::check($this->password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'member_id' => __('auth.failed'),
            ]);
        }

        // Log the user in
        Auth::login($user, $this->remember);

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // Redirect
        if ($this->member_id == '0000') {
            $this->redirectIntended(
                default: route('admin_dashboard', absolute: false),
                navigate: true
            );
        } else {
            $this->redirectIntended(
                default: route('dashboard', absolute: false),
                navigate: true
            );
        }
    }


    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'member_id' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::lower($this->member_id).'|'.request()->ip();
    }
}