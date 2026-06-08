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
    public $member = null, $psa_id;

    #[On('qrScanned')]
    public function qrScanned($code)
    {
        $this->scannedCode = $code;
        $this->success = true;

        // dd($this->scannedCode);
        /*
        Example:
        Fetch data from database here
        */

        // TEMPORARY DISPLAY
        $this->member = DB::table('members')
            ->leftJoin(
                'chapters',
                'members.psa_chapter_code',
                '=',
                'chapters.psa_chapter_code'
            )
            ->where('members.member_id_no', $code)
            ->select(
                'members.*',
                'chapters.psa_chapter_desc'
            )
            ->first();

        // dd($this->member);
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