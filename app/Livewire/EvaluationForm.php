<?php

namespace App\Livewire;

use Livewire\Component;
use Google\Client;
use Google\Service\Sheets;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class EvaluationForm extends Component
{
    public $btnShow = false;

    public $psa_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $ref_no;

    public function updatedPsaId()
    {
        // Reset values first
        $this->btnShow = false;
        $this->first_name = null;
        $this->last_name = null;
        $this->middle_name = null;
        $this->ref_no = null;

        // PSA ID must be exactly 4 digits
        if (strlen($this->psa_id) != 4) {
            return;
        }

        // Check registration tables
        $record =
            DB::table('reg_master')
                ->select('ref_no')
                ->where('psa_id', $this->psa_id)
                ->first()

            ??

            DB::table('vips')
                ->select('ref_no')
                ->where('psa_id', $this->psa_id)
                ->first();

        // Not registered
        if (!$record) {
            session()->flash(
                'message',
                'You are not registered for the Midyear Convention 2026.'
            );

            return;
        }

        // Save ref no
        $this->ref_no = $record->ref_no;

        // Google Sheets setup
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/service-account.json'));
        $client->addScope(Sheets::SPREADSHEETS_READONLY);

        $service = new Sheets($client);

        $spreadsheetId = env('GOOGLE_SHEET_ID');
        $range = "Form Responses 1!A:F";

        $response = $service->spreadsheets_values->get($spreadsheetId, $range);

        $rows = array_slice($response->getValues(), 1);

        foreach ($rows as $row) {

            if (
                isset($row[5]) &&
                strtolower(trim($row[5])) === strtolower(trim($this->psa_id))
            ) {

                $this->first_name = $row[2] ?? null;
                $this->last_name = $row[3] ?? null;
                $this->middle_name = $row[4] ?? null;

                $this->btnShow = true;

                return;
            }
        }
    }

    public function submit()
    {
        $pdf = Pdf::loadView('members.convention-certPDF', [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'psa_id' => $this->psa_id,
            'ref_no' => $this->ref_no,
        ]);

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->stream();
            },
            $this->psa_id . ' - Midyear Convention 2026 Certification.pdf'
        );
    }
    
    public function render()
    {
        return view('livewire.evaluation-form');
    }
}