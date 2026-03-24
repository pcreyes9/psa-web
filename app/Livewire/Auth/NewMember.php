<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;


#[Layout('components.layouts.auth')]

class NewMember extends Component
{
    use WithFileUploads;
    // Personal Information
    public $last_name, $first_name, $middle_initial, $gender, $civil_status, $citizenship;

    // Birth Information
    public $birth_date, $birth_place;

    // Contact Information
    public $email, $contact_number, $home_telephone_number, $home_address;

    // Professional Information
    public $prc_number, $prc_expiration, $pma_id_number, $pma_id_expiration, $phic_id_number, $phic_id_expiration;

    // Education and Practice Information
    public $college_of_medicine, $college_year_graduated, $residency_training, $residency_year_graduated, $local_component_society, $regional_chapter, $hospital_affiliation;

    // Dependents
    public $dependents = [];

    // File Upload
    public $payment;

    public $chapters;

    public function membership(){
        // $this->redirect(route('acc-request', absolute: false), navigate: true);
    }
    public function mount()
    {
        $this->dependents = [
            ['full_name' => '', 'relationship' => '']
        ];

        $this->chapters = DB::table('chapters')->get();
    }

    public function addDependent()
    {
        if (count($this->dependents) >= 3) {
        return; // stop adding
    }

    $this->dependents[] = [
        'full_name' => '',
        'relationship' => ''
    ];
    }

    public function create(): void
    {
        dd($this->last_name, $this->first_name, $this->middle_initial, $this->birth_date, $this->gender, $this->contact_number, $this->email, $this->prc_number, $this->payment);               
        $this->validate([

            // Personal Information
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['nullable', 'string', 'max:10'],
            'gender' => ['required', 'string'],
            'civil_status' => ['required', 'string'],
            'citizenship' => ['nullable', 'string', 'max:255'],

            // Birth Information
            'birth_date' => ['required', 'date'],
            'birth_place' => ['nullable', 'string', 'max:255'],

            // Contact Information
            'email' => ['required', 'email', 'max:255'],
            'contact_number' => ['required', 'string', 'max:20'],
            'home_telephone_number' => ['nullable', 'string', 'max:20'],
            'home_address' => ['required', 'string', 'max:500'],

            // Professional Information
            'prc_number' => ['required', 'string', 'max:255'],
            'prc_expiration' => ['required', 'date'],
            'pma_id_number' => ['required', 'string', 'max:255'],
            'pma_id_expiration' => ['required', 'date'],
            'phic_id_number' => ['required', 'string', 'max:255'],
            'phic_id_expiration' => ['required', 'date'],

            // Education and Practice Information
            'college_of_medicine' => ['nullable', 'string', 'max:255'],
            'college_year_graduated' => ['nullable', 'digits:4'],
            'residency_training' => ['nullable', 'string', 'max:255'],
            'residency_year_graduated' => ['nullable', 'digits:4'],
            'local_component_society' => ['nullable', 'string', 'max:255'],
            'regional_chapter' => ['nullable', 'string', 'max:255'],
            'hospital_affiliation' => ['nullable', 'string', 'max:255'],

            // Dependents
            'dependents' => ['array', 'max:3'],
            'dependents.*.full_name' => ['required', 'string', 'max:255'],
            'dependents.*.relationship' => ['required', 'string', 'max:255'],

            // Payment
            'payment' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],

        ]);
        dd($this->payment);

        DB::table('member')->insert([
            'mem_last_name' => $this->last_name,
            'mem_first_name' => $this->first_name,
            'mem_middle_name' => $this->middle_initial,
            'mem_home_address' => $this->home_address,
            'mem_landline_no1' => $this->home_telephone_number,
            'mem_mobile_no1' => $this->contact_number,
            'mem_email_address' => $this->email,
            'mem_birth_date' => $this->birth_date,
            'mem_birth_place' => $this->birth_place,
            'mem_gender' => $this->gender,
            'mem_citizenship' => $this->citizenship,
            'mem_civil_status' => $this->civil_status,
            'mem_prc_no' => $this->prc_number,
            'mem_prc_exp_date' => $this->prc_expiration,
            'mem_pma_id_no' => $this->pma_id_number,
            'mem_pma_exp_yr' => $this->pma_id_expiration,
            'mem_phic_no' => $this->phic_id_number,
            'mem_phic_exp_yr' => $this->phic_id_expiration,
            'datejoin' => now(),
        ]);

        DB::table('member_education')->insert([
            'member_id_no' => $this->last_name,
            'educ_school' => $this->college_of_medicine,
            'edc_year_graduated' => $this->college_year_graduated,
        ]);

        DB::table('member_training')->insert([
            'member_id_no' => $this->last_name,
            'training_level' => 'Residency',
            'training_institution' => $this->residency_training,
            'training_inclusives_dates' => $this->residency_year_graduated,
        ]);

        foreach ($this->dependents as $dep) {
            DB::table('member_beneficiaries')->insert([
                'member_id_no' => $this->last_name,
                'beneficiary_name' => $dep['full_name'],
                'beneficiary_relation' => $dep['relationship'],
            ]);
        }


        // $mem = DB::table('members')->where('member_id_no', $this->member_id)->first();
        // try{
        //     $mem_email = $mem->mem_email_address;
        //     Mail::mailer('info')->to('pcreyes09@gmail.com')->send(new CreationRequest($this->member_id, $mem->mem_last_name, $mem->password));
        //     session()->flash('status', __('An account creation request has been sent to this email address: ') . $mem_email);
        // }
        // catch (\Exception $e){
        //     session()->flash('error', __('No member found with the provided PSA ID. Please contact PSA Secretariat for assistance.'));
        // }     
    }

    // public function NewMember()
    // {
    //     return view('livewire.auth.new-member');
    // }

    public function render()
    {
        return view('livewire.auth.new-member');
    }
}
