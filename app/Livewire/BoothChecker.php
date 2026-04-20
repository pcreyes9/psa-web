<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BoothChecker extends Component
{
    public $search, $boothVisit = [], $boothsToVisit = [], $name;
    public function render()
    {

        $member = DB::table('members')
            ->where('member_id_no', $this->search)
            ->first();

        if (!$member && strlen($this->search) > 4) {
            $member = null;
            session()->flash('message', 'PSA ID not found. Please enter a valid PSA ID.');
            
            // return;
        }
        else if ($member){
            $this->name = $member->mem_first_name . ' ' . $member->mem_last_name;

            $this->boothVisit= DB::table('booth_reg')
                ->where('psa_id', $this->search)
                ->get();
                // dd($this->boothVisit);
            $this->boothsToVisit = DB::table('exhibitors as e')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('booth_reg as b')
                        ->whereColumn('b.exhibitor_name', 'e.pharma_name')
                        ->where('b.psa_id', $this->search);
                })
                ->get();
        }
        
        return view('livewire.booth-checker');
    }
}
