<?php

namespace App\Livewire;

use App\Mail\MidyearConvention\RegistrationEmail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

class WorkshopRegistration extends Component
{
    use WithFileUploads;

    public $member;
    public $psa_id, $prc_number, $contact_number, $email_address, $proof_of_payment;
    public $hospitalName, $hospitalAddress;

    public $show = false, $disc_show = false;
    public $res, $list, $name, $disc="", $err="";
    public $payment_proof, $discount_img, $discount_name = "No discount", $payment_name;

    public $allowed_ext = ['jpg', 'jpeg', 'png', 'heic'];

    public $wrshps = [];

    public bool $btnShow = false, $btnSubmit = true;

    public function render()
    {
        $this->wrshps = [
            [
                'name' => 'Regional Anesthesia Workshop',
                'count' => DB::table('workshop_reg')
                    ->where('workshop', 'Regional Anesthesia Workshop')
                    ->count()
            ],
            [
                'name' => 'POCUS Workshop',
                'count' => DB::table('workshop_reg')
                    ->where('workshop', 'POCUS Workshop')
                    ->count()
            ],
            [
                'name' => 'Airway Workshop',
                'count' => DB::table('workshop_reg')
                    ->where('workshop', 'Airway Workshop')
                    ->count()
            ],
        ];
        if(strlen($this->name) >= 2){
            // dd(strlen($this->name));
            $this->res=array();
            $this->list=DB::table('registrations')->where('last_name', 'like', '%'.$this->name )->where('status', 'Confirmed')->orderBy('last_name')->get()->toArray();
            foreach($this->list as $lis){
                $this->res [] = $lis->psa_id . ' - ' . $lis->last_name . ', ' . $lis->first_name;
            }
        }
        else if(strlen($this->psa_id) > 4){
            session()->flash('message', 'Your PSA ID has only 4 digits.');
        }
        
        if(strlen($this->psa_id) == 4 && DB::table('registrations')->where('psa_id', $this->psa_id)->where('status', '!=', 'Confirmed')->exists()){
            session()->flash('message', 'Your are already registered but payment is not yet confirmed. Please reach out the PSA Secretariat for assistance. Thank You!' );
        }
        else if(strlen($this->psa_id) == 4 && !DB::table('registrations')->where('psa_id', $this->psa_id)->exists()){
            session()->flash('message', 'Your are not yet registered. Please proceed to registration.' );
        }
        else {
            $this->member = DB::table('registrations')->where('psa_id', $this->psa_id)->first();
        }

        return view('livewire.workshop-registration', [
            'workshops' => $this->wrshps
        ]);
    }

    public function showChecker(){
        // dd("checker");
        if($this->show)
            $this->show = false;
        else
            $this->show = true; 
    }

    public function submit(){
        // dd($this->);
        $this->btnSubmit = false;
        $this->btnShow = false;

        if($this->err != ""){
            session()->flash('message', $this->err);
            $this->err = "";
        }
        else{
            $this->register();
            // dd("proceed to save");
        }
        
        $this->btnSubmit = true;
    }

    public function register(){
        DB::table('workshop_reg')->insert([
            'psa_id' => $this->psa_id,  
            'prc_id' => $this->prc_number,
            'workshop' => $this->member->mem_last_name,

            'created_at' => Carbon::now(),  // Use Carbon to get the current timestamp
            'updated_at' => Carbon::now(),  // Same for updated_at
        ]);

        Mail::mailer('smtp')->to($this->email_address)->send(new RegistrationEmail($this->member->mem_last_name));
        return redirect()->route('midyear-registration-deets')->with('success', 'Your registration is on process, Dr. ' . $this->member->mem_last_name . '. We will update you in this email, ' . $this->email_address . '. Thank you and we hope to see you soon!');
    }
}
