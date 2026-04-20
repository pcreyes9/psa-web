<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class BoothController extends Component
{
    public $booth_name, $psa_id, $member, $btnShow = false;
    public function mount($booth)
    {
        $this->booth_name = DB::table('exhibitors')->where('code', $booth)->value('pharma_name');
        // dd($this->booth_name);
    }

    public function render()
    {
        $this->member = DB::table('registrations')->where('psa_id', $this->psa_id)->first();

        if(!$this->member && strlen($this->psa_id) > 4) {
            session()->flash('message', 'PSA ID not found. Please enter a valid PSA ID.');
            $this->btnShow = false;
        } 
        else if (DB::table('booth_reg')->where('psa_id', $this->psa_id)->where('exhibitor_name', $this->booth_name)->exists()) {
            session()->flash('message', 'You are already registered for this booth.');
            $this->btnShow = false;
        }
        else if ($this->member && strlen($this->psa_id) === 4) {
            $this->btnShow = true;
        }

        return view('livewire.booth-controller');
    }

    public function submit(){
        DB::table('booth_reg')->insert([
            'psa_id' => $this->psa_id,
            'name' => $this->member->first_name . ' ' . $this->member->last_name,
            'exhibitor_name' => $this->booth_name,
            'created_at' => now(),
        ]);
        return redirect()->route('booth-checker')->with('success', "You have successfully registered, " . $this->booth_name .", " . ' Dr. '. $this->member->first_name ." " . $this->member->last_name);
    }
}
