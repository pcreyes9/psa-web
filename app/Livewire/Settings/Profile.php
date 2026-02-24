<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Profile extends Component
{
    public $last_name;
    public $first_name;
    public $middle_name;
    public $email_address;
    public $mem_data;
    public $psa_id;
    public $editing = false;

    /** 
     * Mount the component.
     */
    public function mount(): void
    {
        $this->mem_data = DB::table('members')->where('member_id_no', Auth::user()->id)->first();
        // dd($this->mem_data);
            $this->psa_id = $this->mem_data->member_id_no;
            $this->last_name = $this->mem_data->mem_last_name;
            $this->first_name = $this->mem_data->mem_first_name;
            $this->middle_name = $this->mem_data->mem_middle_name;
            $this->email_address = $this->mem_data->mem_email_address;
        
    }

    public function enableEdit()
    {
        $this->editing = true;
    }
    
    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        // dd($this->last_name, $this->first_name, $this->middle_initial, $this->email_address);
        $user = Auth::user();

        $validated = $this->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'email_address' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            //  Rule::unique('users', 'mem_email_address')->ignore($user->id, 'mem_id'),
        ]);

        DB::table('members')->where('member_id_no', $this->psa_id)
        ->update([
            'mem_last_name' => $this->last_name,
            'mem_first_name' => $this->first_name,
            'mem_middle_name' => $this->middle_name,
            'mem_email_address' => $this->email_address
        ]);
        
        $this->editing = false;
        session()->flash('status', __('Profile updated successfully.'));


        // $user->fill($validated);

        // if ($user->isDirty('mem_email_address')) {
        //     $user->email_verified_at = null;
        // }

        // $user->save();

        // $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    // public function resendVerificationNotification(): void
    // {
    //     $user = Auth::user();

    //     if ($user->hasVerifiedEmail()) {
    //         $this->redirectIntended(default: route('dashboard', absolute: false));

    //         return;
    //     }

    //     $user->sendEmailVerificationNotification();

    //     Session::flash('status', 'verification-link-sent');
    // }

    public function render()
    {
        return view('livewire.settings.profile')
        ->layout('components.layouts.app', [
            'title' => $this->title ?? 'PSA Profile',
        ]);
    }
}
