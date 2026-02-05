<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class MemLogin extends Component
{
    public $psa_id, $password;
    public function render()
    {
        return view('livewire.mem-login');
    }

    public function login(){
        $exists = DB::table('members')
        ->where('member_id_no', $this->psa_id)
        ->where('password', $this->password)
        ->get('mem_last_name');
        dd($exists);
    }
}