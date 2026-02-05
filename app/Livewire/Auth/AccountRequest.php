<?php

namespace App\Livewire\Auth;

use App\Mail\MemberAccount\CreationRequest;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

#[Layout('components.layouts.auth')]

class AccountRequest extends Component
{
    public string $member_id = '';
    public bool $showButton = false;

    public function sendAccountRequest(): void
    {
        $this->validate([
            'member_id' => ['required', 'string'],
        ]);
        $mem = DB::table('members')->where('member_id_no', $this->member_id)->first();
        try{
            $mem_email = $mem->mem_email_address;
            Mail::mailer('info')->to('pcreyes09@gmail.com')->send(new CreationRequest($this->member_id, $mem->mem_last_name, $mem->password));
            session()->flash('status', __('An account creation request has been sent to this email address: ') . $mem_email);
        }
        catch (\Exception $e){
            session()->flash('error', __('No member found with the provided PSA ID. Please contact PSA Secretariat for assistance.'));
        }     
    }

    public function AccountRequest()
    {
        return view('livewire.auth.account-request');
    }

    public function render()
    {
        $this->showButton = false;
        if($this->member_id != ""){
            $mem = DB::table('members')->where('member_id_no', $this->member_id)->first();

            if(DB::table('users')->where('id', $this->member_id)->exists()){
                $this->showButton = false;
                session()->flash('info', __('An account with this PSA ID already exists. Please login or use the Forgot Password option if you have forgotten your password.'));

            }else{
                try{
                    $mem_email = $mem->mem_email_address;
                    if($mem){
                        if ($mem_email == null || $mem_email == '' || $mem_email == 'N/A'){ 
                            session()->flash('error', __('The member with the provided PSA ID does not have an email address on file. Please contact PSA Secretariat for assistance.'));
                        }
                        else{
                            $this->showButton = true;
                        }
                    }
                }
                catch (\Exception $e){
                    $this->showButton = false;
                    session()->flash('error', __('No member found with the provided PSA ID. Please contact PSA Secretariat for assistance.'));
                }
            } 
        }
        return view('livewire.auth.account-request');
    }
}
