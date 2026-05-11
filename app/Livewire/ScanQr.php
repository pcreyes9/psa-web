<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ScanQr extends Component
{
    public $scannedCode = '';
    public $displayName = 'Waiting for Scan...';
    public $success = false;
    public $member, $psa_id;

    #[On('qrScanned')]
    public function qrScanned($code)
    {
        // $this->scannedCode = $code;
        $this->success = true;

        /*
        Example:
        Fetch data from database here
        */

        // TEMPORARY DISPLAY
        $this->member = DB::table('members')
            ->where('member_id_no', $code)
            ->first();

        if ($this->member) {

            $this->displayName =
                'Name: ' . $this->member->mem_first_name . ' ' .
                $this->member->mem_last_name;
            $this->psa_id = 'PSA ID: ' . $this->member->member_id_no;

        } else {

            $this->displayName = 'Member Not Found';
        }
    }

    public function scanAgain()
    {
        $this->reset([
            'scannedCode',
            'success'
        ]);

        $this->displayName = 'Waiting for Scan...';

        $this->dispatch('restartScanner');
    }

    public function render()
    {
        return view('livewire.scan-qr');
    }
}