<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Mail;
use App\Mail\MidyearConvention\PayConfirmEmail;

=======
use Illuminate\Pagination\Paginator;
>>>>>>> 4b283012947d011ad0266f594deb52c98af61e5d

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
<<<<<<< HEAD
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

    public function approve($id){
        // dd($id);

        DB::table('registrations')->where('id', $id)->update(['status' => 'Confirmed']);
        $mem = DB::table('registrations')->where('id', $id)->first();
        Mail::mailer('smtp')->to($mem->email)->send(new PayConfirmEmail ($mem->last_name));

        $this->render();
        // return redirect()->route('admin_dashboard')->with('success', 'Registration ID ' . $id . ' has been approved!');
=======
>>>>>>> 4b283012947d011ad0266f594deb52c98af61e5d
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