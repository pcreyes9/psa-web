<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;



class ConventionRegistration extends Component
{
    use WithPagination;

    public $sort = 'dateNew', $sortName = 'Registration ID (newest)', $label = 'Registration ID (newest)';
    public $from, $to, $search;
    
    public function render()
    {
        if($user = Auth::user()->id != 0){
            return redirect()->route('dashboard');
        }
        Paginator::useBootstrapFive();
        $reg = DB::table('registrations')->orderBy('id', 'DESC')->Paginate(15);

        $map = [
            'dateNew'   => ['id','DESC','Registration ID (newest)'],
            'dateOld'   => ['id','ASC','Registration ID (oldest)'],
            'pending' => ['status','DESC','Status (Pending)'],
            'approved' => ['status','ASC','Status (Approved)'],
        ];

        [$col, $dir, $label] = $map[$this->sort] ?? $map[$this->sort];

        if ($this->search) {
            $col = 'last_name';
            $dir = 'ASC';
        }

        // $reg = DB::table('registrations')->orderBy($col, $dir)->paginate(15);
        $reg = DB::table('registrations')->where('last_name', 'like', "$this->search%")->orderBy($col, $dir)->paginate(20);
        $this->sortName = $label;
        $this->label = $label;

        
        // dd( $reg );
        return view('livewire.admin.convention-registration', compact('reg'));
    }

    public function exportPDF(){
        $this->validate([
            'from' => 'required|numeric',
            'to'   => 'required|numeric',
        ]);
        $info = DB::table('registrations')->where('id', '>=' , $this->from)->where('id', '<=' , $this->to)->get();
        // dd($info);
        $pdf = Pdf::loadView('admin.exportPDF', [
            'info' => $info
        ]);
        return response()->streamDownload(function () use ($pdf) { echo $pdf->stream(); }, 'Registration ID ' . $this->from . ' - ' . $this->to .'.pdf');
    }

    public function updatedSort()
    {
        $this->resetPage();
    }
}
