<?php

namespace App\Livewire;

use Livewire\Component;

class EmailUpdate extends Component
{
    public $psa_id = '';
    public function render()
    {
        return view('livewire.email-update');
    }
}
