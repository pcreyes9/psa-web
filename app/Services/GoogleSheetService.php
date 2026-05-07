<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetService
{
    private function client()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/service-account.json'));
        $client->addScope(Sheets::SPREADSHEETS_READONLY);

        return $client;
    }

    private function service()
    {
        return new Sheets($this->client());
    }

    public function getRows()
    {
        $spreadsheetId = env('GOOGLE_SHEET_ID');
        $range = "Form Responses 1!A:Z";

        $response = $this->service()
            ->spreadsheets_values
            ->get($spreadsheetId, $range);

        return $response->getValues() ?? [];
    }

    public function hasSubmitted($email)
    {
        $rows = $this->getRows();

        foreach ($rows as $row) {
            // adjust index depending on your sheet columns
            if (isset($row[1]) && strtolower($row[1]) === strtolower($email)) {
                return true;
            }
        }

        return false;
    }
}