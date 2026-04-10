<?php

namespace App\Livewire;

use App\Mail\MidyearConvention\WorkshopRegistrationEmail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class WorkshopRegistration extends Component
{
    use WithFileUploads;

    public $psa_id, $prc_number, $contact_number, $email_address;
    public $first_name, $last_name, $middle_initial;

    public $show = false;
    public $res = [], $list, $name, $disc = "", $err = "";
    public $wrshps = [];
    public $wrshp;

    public bool $btnShow = false, $btnSubmit = true;

    public function mount()
    {
        $this->loadWorkshops();
    }

    public function render()
    {
        return view('livewire.workshop-registration', [
            'workshops' => $this->wrshps
        ]);
    }

    private function loadWorkshops()
    {
        $counts = DB::table('workshop_reg')
            ->select('workshop', DB::raw('COUNT(*) as count'))
            ->groupBy('workshop')
            ->pluck('count', 'workshop');

        $workshopNames = [
            'Regional Anesthesia Workshop',
            'POCUS Workshop',
            'Airway Workshop',
        ];

        $this->wrshps = collect($workshopNames)->map(function ($name) use ($counts) {
            return [
                'name' => $name,
                'count' => $counts[$name] ?? 0
            ];
        })->toArray();
    }

    public function updatedPsaId()
    {
        $this->resetMessages();

        if (strlen($this->psa_id) !== 4) {
            return;
        }

        $registration = DB::table('registrations')
            ->where('psa_id', $this->psa_id)
            ->first();

        if (!$registration) {
            session()->flash('message', 'You are not yet registered. Please proceed to registration.');
            return;
        }

        if ($registration->status == 'Pending') {
            session()->flash('message', 'Your registration exists but payment is not yet confirmed.');
            return;
        }

        if (DB::table('workshop_reg')->where('psa_id', $this->psa_id)->exists()) {
            $workshop = DB::table('workshop_reg')
                ->where('psa_id', $this->psa_id)
                ->value('workshop');

            session()->flash('message', "You have already registered for ($workshop). Thank you!");
            return;
        }

        $this->fill([
            'first_name' => $registration->first_name,
            'last_name' => $registration->last_name,
            'middle_initial' => $registration->middle_name,
            'prc_number' => $registration->prc_number,
            'contact_number' => $registration->contact_number,
            'email_address' => $registration->email,
        ]);

        $this->btnShow = true;
    }

    public function updatedName()
    {
        if (strlen($this->name) < 2) {
            $this->res = [];
            return;
        }

        $this->res = DB::table('registrations')
            ->where('last_name', 'like', "%{$this->name}%")
            ->where('status', '!=', 'Pending')
            ->orderBy('last_name')
            ->get()
            ->map(fn($r) => "{$r->psa_id} - {$r->last_name}, {$r->first_name}")
            ->toArray();
    }

    public function showChecker()
    {
        $this->show = !$this->show;
    }

    public function submit()
    {
        if (DB::table('workshop_reg')->where('psa_id', $this->psa_id)->exists()) {
            $workshop = DB::table('workshop_reg')
                ->where('psa_id', $this->psa_id)
                ->value('workshop');

            session()->flash('message', "You have already registered for $workshop. Thank you!");
            return;
        }
        else{
            $count = DB::table('workshop_reg')
            ->where('workshop', $this->wrshp)
            ->count();

        if ($count >= 60) {
            $this->addError('wrshp', 'This workshop is already full.');
            return;
        }

        DB::table('workshop_reg')->insert([
            'psa_id' => $this->psa_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_initial' => $this->middle_initial,
            'prc_id' => $this->prc_number,
            'workshop' => $this->wrshp,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

            Mail::mailer('smtp')->to($this->email_address)->send(new WorkshopRegistrationEmail($this->last_name, $this->wrshp)); 
            return redirect()->route('sci-prog')->with('success', "You have successfully registered, '" . $this->wrshp ."', " . ' Dr. '. $this->first_name ." " . $this->last_name);

        $this->loadWorkshops();

        session()->flash('message', 'Workshop registration successful!');
        }
    }

    private function resetMessages()
    {
        session()->forget('message');
    }
}