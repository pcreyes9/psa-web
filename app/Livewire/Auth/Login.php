<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

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
        $this->validate();

        $this->ensureIsNotRateLimited();

        // Fetch the user using id field
        $user = User::where('id', $this->member_id)->first();

        // Validate plain text password
        if (! $user || $user->password !== $this->password) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'member_id' => __('auth.failed'),
            ]);
        }

        // Log the user in without password hashing
        Auth::login($user, $this->remember);

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // Redirect to dashboard
        // dd(Auth::user());
        if ($this->member_id == '0000') {
            // dd('admin');
            $this->redirectIntended(
                default: route('admin_dashboard', absolute: false),
                navigate: true
            );
        }else{
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