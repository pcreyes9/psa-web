<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ConventionRegistration extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $sort = 'dateNew';
    public $sortName = 'Registration ID (newest)';
    public $label = 'Registration ID (newest)';
    public $from;
    public $to;
    public $search;

    public function mount()
    {
        if (Auth::user()->id != 0) {
            redirect()->route('dashboard')->send();
        }
    }

    public function updatedSort()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        Paginator::useBootstrapFive();

        // Map for sorting
        $map = [
            'dateNew'   => ['id','DESC','Registration ID (newest)'],
            'dateOld'   => ['id','ASC','Registration ID (oldest)'],
            'pending'   => ['status','DESC','Status (Pending)'],
            'approved'  => ['status','ASC','Status (Approved)'],
        ];

        [$col, $dir, $label] = $map[$this->sort] ?? $map['dateNew'];

        $query = DB::table('registrations');

        if ($this->search) {
            $query->where('last_name', 'like', "$this->search%");
            $col = 'last_name';
            $dir = 'ASC';
        }

        $reg = $query->orderBy($col, $dir)->paginate(20);

        $this->sortName = $label;
        $this->label = $label;

        return view('livewire.admin.convention-registration', compact('reg'));
    }

    public function approve($id)
    {
        dd($id);
        DB::table('registrations')->where('id', $id)->update(['status' => 'Approved']);
        session()->flash('success', "Registration ID {$id} has been approved!");
    }

    public function exportPDF()
    {
        $this->validate([
            'from' => 'required|numeric',
            'to'   => 'required|numeric',
        ]);

        $info = DB::table('registrations')
            ->whereBetween('id', [$this->from, $this->to])
            ->get();

        $pdf = Pdf::loadView('admin.exportPDF', ['info' => $info]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Registration ID {$this->from}-{$this->to}.pdf");
    }
}