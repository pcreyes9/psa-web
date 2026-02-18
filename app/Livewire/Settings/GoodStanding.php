<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;



class GoodStanding extends Component
{   
    public $mem, $gender, $purpose, $mem_type;

    public function mount()
    {
        $this->mem = DB::table('members')->where('member_id_no', Auth::user()->id)->first();
        if($this->mem->psa_mem_type == 'RM') {
            $this->mem_type = 'Regular Member';
        } elseif($this->mem->psa_mem_type == 'LM') {
            $this->mem_type = 'Life Member';
        } elseif($this->mem->psa_mem_type == 'TM') {
            $this->mem_type = 'Trainee Member';
        } else {
            $this->mem_type = 'Contact PSA Office';
        }

        $this->purpose = 'Philhealth Purposes';
        
        // if($this->mem->mem_gender == 'Male') {
        //     $this->gender = 'He';
        // } elseif($this->mem->mem_gender == 'Female') {
        //     $this->gender = 'She';
        // } else {
        //     $this->gender = 'They'; 
        // }
    }
    
    public function submit()
    {
        $this->validate([
            'purpose' => 'required',
        ]);
        // dd($this->purpose, $this->gender);

        $pdf = Pdf::loadView('members.goodtandingPDF', [
            'info' => $this->mem,
            'purpose' => $this->purpose,
            'mem_type' => $this->mem_type,
        ]);
        return response()->streamDownload(function () use ($pdf) { echo $pdf->stream(); }, $this->mem->mem_first_name . ' ' . $this->mem->mem_last_name . ' - Certificate of Good Standing.pdf');

}
    public function render()
    {
        return view('livewire.settings.good-standing')
        ->layout('components.layouts.app', [
                'title' => $this->title ?? 'PSA Good Standing',
            ]);
    }
}