<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('components.layouts.auth')]

class NewMember extends Component
{
    use WithFileUploads;
    public $last_name, $first_name, $middle_name, $birth_date, $gender, $contact_number, $address, $prc_number, $email, $payment;

    public function membership(){
        // $this->redirect(route('acc-request', absolute: false), navigate: true);
    }

    public function create(): void
    {
        $this->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'contact_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'prc_number' => ['required', 'string', 'max:255'],
            'payment' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);
        dd($this->payment);


        // $mem = DB::table('members')->where('member_id_no', $this->member_id)->first();
        // try{
        //     $mem_email = $mem->mem_email_address;
        //     Mail::mailer('info')->to('pcreyes09@gmail.com')->send(new CreationRequest($this->member_id, $mem->mem_last_name, $mem->password));
        //     session()->flash('status', __('An account creation request has been sent to this email address: ') . $mem_email);
        // }
        // catch (\Exception $e){
        //     session()->flash('error', __('No member found with the provided PSA ID. Please contact PSA Secretariat for assistance.'));
        // }     
    }

    // public function NewMember()
    // {
    //     return view('livewire.auth.new-member');
    // }

    public function render()
    {
        return view('livewire.auth.new-member');
    }
}
