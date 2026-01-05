<?php

namespace App\Livewire;

use App\Mail\MidyearConvention\RegistrationEmail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MidyearRegistration extends Component
{    
    use WithFileUploads;

    public $member;
    public $psa_id, $prc_number, $contact_number, $email_address, $proof_of_payment;
    public $hospitalName, $hospitalAddress;

    public $show = false, $disc_show = false;
    public $res, $list, $name, $disc="", $err="";
    public $payment_proof, $discount_img, $discount_name = "No discount", $payment_name;

    public $allowed_ext = ['jpg', 'jpeg', 'png', 'heic'];

    public function render()
    {
        if(DB::table('registrations')->where('psa_id', '=', $this->psa_id)->exists()){
            session()->flash('message', 'You are already registered. If you have any concern about your registration, please kindly reply to the email we sent to '. DB::table('registrations')->where('psa_id', '=', $this->psa_id)->value('email') .'. Thank you!');
        }

        if($this->disc != ""){
            $this->disc_show = true;
        }
        $this->member = DB::table('members')
        ->where('member_id_no', $this->psa_id)
        ->first();

        // dd($member);
        
        if(strlen($this->psa_id) > 4){
            session()->flash('message', 'Your PSA ID has only 4 digits.');
        }
        
        if(strlen($this->name) >= 3){
            // dd(strlen($this->name));
            $this->res=array();
            $this->list=DB::table('members')->where('mem_last_name', 'like', '%'.$this->name )->orWhere('mem_last_name', 'like', $this->name .'%' )->get()->toArray();
            foreach($this->list as $lis){
                $this->res [] = $lis->member_id_no . ' - ' . $lis->mem_last_name . ', ' . $lis->mem_first_name;
            }
        // dd($this->res);
        }

        return view('livewire.midyear-registration', [
            'member' => $this->member,
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
        $date = Carbon::now()->format('mdy_his');
        // dd($date);
        $pay_extension = strtolower($this->payment_proof->extension());

        // dd("submitted");
        if (in_array($pay_extension, $this->allowed_ext)) {
            $this->payment_name = "{$this->psa_id}_{$this->member->mem_last_name}_Proof_of_Payment_{$date}.{$pay_extension}";
        } else {
            $this->err = "INVALID FILE FORMAT OF PROOF OF PAYMENT.";
        }

        if($this->disc != "non_disc"){
            $disc_extension = strtolower($this->discount_img->extension());
            if (in_array($disc_extension, $this->allowed_ext)) {
                $this->discount_name = "{$this->psa_id}-{$this->member->mem_last_name}-{$this->disc}-{$date}.{$disc_extension}";
            } else {
                $this->err = "INVALID FILE FORMAT OF DISCOUNT ID.";
            }       
        }

        if($this->err != ""){
            session()->flash('message', $this->err);
            $this->err = "";
        }
        else{
            $this->register();
            // dd("proceed to save");
        }
    }

    public function register(){
        DB::table('registrations')->insert([
            'psa_id' => $this->psa_id,  
            'prc_number' => $this->prc_number,
            'last_name' => $this->member->mem_last_name,
            'first_name' => $this->member->mem_first_name,
            'middle_name' => $this->member->mem_middle_name,

            'hospital_name' => $this->hospitalName,
            'hospital_address' => $this->hospitalAddress,
            'email' => $this->email_address,
            'contact_number' => $this->contact_number,
            'gender' => 'N/A',
            'membership' => $this->member->psa_mem_type,
            'status' => "Pending",
            'country' => "Philippines",

            'discount_id' => $this->discount_name,
            'proof_payment' => $this->payment_name,

            'created_at' => Carbon::now(),  // Use Carbon to get the current timestamp
            'updated_at' => Carbon::now(),  // Same for updated_at
        ]);
        
        $this->payment_proof->storeAs(
            'photos/payments',
            $this->payment_name,
            'public_uploads'
        );

        if($this->disc != "non_disc" && $this->discount_img) {
            $this->discount_img->storeAs(
                'photos/discounts',
                $this->discount_name,
                'public_uploads'
            );
        }




        Mail::mailer('smtp')->to($this->email_address)->send(new RegistrationEmail($this->member->mem_last_name));
        return redirect()->route('midyear-registration')->with('success', 'Your registration is on process, Dr. ' . $this->member->mem_last_name . '. We will update you in this email, ' . $this->email_address . '. Thank you and we hope to see you soon!');
    }
}
