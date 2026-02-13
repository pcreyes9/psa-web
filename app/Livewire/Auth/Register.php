<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $member_id = '', $code = '';

    public bool $showForm = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // dd($this->name);
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'member_id' => ['required', 'string', 'exists:members,member_id_no'], // ensures it exists in members table
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['id'] = $this->member_id;

        event(new Registered(($user = User::create($validated))));

        $check = DB::table('members')->where('member_id_no', $this->member_id)->value('bal');
        if ($check != 0) {
            session()->flash('info', __('Your website account has been created. However, your membership is not in good standing. Please settle your dues to proceed.') );
            return;
        }
        else{
            Auth::login($user);
        }
        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function render()
    {   
        // dd($this->showForm);
        if(DB::table('users')->where('id', $this->member_id)->exists()){
            $this->showForm = false;
            session()->flash('info', __('An account with this PSA ID already exists. Please login or use the Forgot Password option if you have forgotten your password.') );
        }

        else if($this->code == DB::table('members')->where('member_id_no', $this->member_id)->value('password') && $this->code != ""){
            $member = DB::table('members')->where('member_id_no', $this->member_id)->first();
            if ($member) {
                $this->name = trim("{$member->mem_first_name} {$member->mem_middle_name} {$member->mem_last_name}");
            }
            $this->showForm = true;
        }
        else if ($this->code != ""){
            $this->name = '';
            $this->showForm = false;
            session()->flash('error', __('The code you entered is incorrect. Please check your email for the correct code.') );
        }
        return view('livewire.auth.register');
    }
}
