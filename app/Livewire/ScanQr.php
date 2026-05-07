<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class ScanQr extends Component
{
    #[On('qrScanned')]
    public function qrScanned($code)
    {
        dd($code);
    }

    public function render()
    {
        return view('livewire.scan-qr');
    }
}
