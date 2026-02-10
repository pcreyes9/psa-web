<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]

class NewMember extends Component
{
    public $last_name, $first_name, $middle_name, $birth_date, $gender, $contact_number, $address, $prc_number, $email;

    public function membership(){
        // $this->redirect(route('acc-request', absolute: false), navigate: true);
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
