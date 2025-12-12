<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $day, $title;

    public function landing()
    {
        $base = public_path('images/gallery/aca_2025');

        // Get all files recursively
        $allFiles = collect(File::allFiles($base));

        // Map to last folder + relative path + filename, filter only landscape
        $files = $allFiles->map(function ($file) use ($base) {

            // Check image dimensions
            [$width, $height] = getimagesize($file->getPathname());

            // Only keep landscape images
            if ($width <= $height) {
                return null;
            }

            // Relative path from public/
            $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $file->getPathname());

            // Get last folder name
            $folders = explode(DIRECTORY_SEPARATOR, str_replace($base . DIRECTORY_SEPARATOR, '', $file->getPath()));
            $lastFolder = end($folders);

            return [
                'last_folder' => $lastFolder,
                'relative_path' => $relativePath,
                'filename' => $file->getFilename()
            ];
        })
        ->filter() // remove null values (portrait images)
        ->values();

        // Pick 9 random landscape images
        $random9 = $files->shuffle()->take(15)->values()->toArray();
        // dd($random9);

        // Return to view
        return view("template.pages.landing", [
            "arrLanding" => $random9,
            "title" => "Philippine Statistical Association - 2025 ACA Gallery"
        ]);
    }

    public function general($day)
    {
        $this->day = $day;

        // Set the title
        if ($day == 'day1') {
            $this->title = "Gallery - Day 1"; 
        } elseif ($day == 'day2') {
            $this->title = "Gallery - Day 2"; 
        } elseif ($day == 'day3') {
            $this->title = "Gallery - Day 3"; 
        }

        // Path to the specific day folder inside aca_2025
        $base = public_path('images/gallery/aca_2025/' . $day);

        // Make sure the folder exists
        if (!is_dir($base)) {
            return view("template.pages.gallery-aca-test", [
                "arrGallery" => [],
                "title" => $this->title
            ]);
        }

        $folders = collect(File::directories($base)); // get subfolders only

        $arrGallery = [];

        foreach ($folders as $folderPath) {
            $subfolderName = basename($folderPath); // e.g., opening_ceremony, asean_night

            // Get all files in this subfolder
            $files = collect(File::files($folderPath))
                ->map(function ($file) use ($base) {
                    // Check if landscape
                    [$width, $height] = getimagesize($file->getPathname());
                    if ($width <= $height) {
                        return null; // skip portrait
                    }

                    // Relative path from public/
                    $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $file->getPathname());

                    return [
                        'filename' => $file->getFilename(),
                        'relative_path' => $relativePath
                    ];
                })
                ->filter() // remove portrait images
                ->values()
                ->toArray();

            $arrGallery[$subfolderName] = $files;
        }

        // dd($arrGallery);
        // Return to view
        return view("template.pages.gallery-aca-test", [
            "arrGallery" => $arrGallery,
            "title" => $this->title
        ]);
    }
}
