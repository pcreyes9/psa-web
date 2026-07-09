<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;


class ScanQr extends Component
{
    use WithFileUploads;

    public $scannedCode = '';
    public $displayName = 'Waiting for Scan...';
    public $success = false;
    public $member = null, $psa_id;
    public $photo;

    #[On('qrScanned')]
    public function qrScanned($code)
    {
        $this->scannedCode = $code;
        $this->success = true;

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

    public function uploadPhoto()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $filename = $this->member->member_id_no . '.' . $this->photo->extension();

        $path = $this->photo->storeAs(
            'member-photos',
            $filename,
            'public'
        );

        DB::table('members')
            ->where('member_id_no', $this->member->member_id_no)
            ->update([
                'photo_path' => $path,
            ]);

        // Update local object so the UI immediately shows the new image
        $this->member->photo_path = $path;

        session()->flash(
            'success',
            'Photo uploaded successfully.'
        );
    }

    public function render()
    {
        return view('livewire.scan-qr');
    }
}
