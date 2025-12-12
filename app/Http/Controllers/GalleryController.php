<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $day, $title;

    public function show($day){
        // dd($day);
        $this->day = $day;

        if($day == 'day1')
            { $this->title = "Gallery - Day 1"; } 
        elseif($day == 'day2')
            { $this->title = "Gallery - Day 2"; } 
        elseif($day == 'day3')
            { $this->title = "Gallery - Day 3"; }

        $arrOpening = [];
        $arrReg = [];
        $arrAsean = [];
        $arrChapter = [];
        $arrLectures = [];

        // $opening = File::allFiles(public_path('images/gallery/day1/opening_ceremony'));
        // $reg = File::allFiles(public_path('images/gallery/day1/registration'));
        // $asean = File::allFiles(public_path('images/gallery/day1/asean_night'));

        $opening = File::allFiles(public_path('images/gallery/aca_2025/' . $this->day . '/opening_ceremony'));
        $reg = File::allFiles(public_path('images/gallery/aca_2025/' . $this->day . '/registration'));
        $asean = File::allFiles(public_path('images/gallery/aca_2025/' . $this->day . '/asean_night'));
        $chapter = File::allFiles(public_path('images/gallery/aca_2025/' . $this->day . '/chapter_delegates'));
        $lectures = File::allFiles(public_path('images/gallery/aca_2025/' . $this->day . '/lectures'));

        foreach ($opening as $file) {
            $arrOpening[] = pathinfo($file)['basename']; // filename + extension
        }

        foreach ($reg as $file) {
            $arrReg[] = pathinfo($file)['basename']; // filename + extension
        }

        foreach ($asean as $file) {
            $arrAsean[] = pathinfo($file)['basename']; // filename + extension
        }
        foreach ($chapter as $file) {
            $arrChapter[] = pathinfo($file)['basename']; // filename + extension
        }
        foreach ($lectures as $file) {
            $arrLectures[] = pathinfo($file)['basename']; // filename + extension
        }

        // dd(array("arrOpening"=>$arrOpening, "arrReg"=>$arrReg, "arrAsean"=>$arrAsean), $this->title);

        return view("template.pages.gallery-aca", array("arrOpening"=>$arrOpening, "arrReg"=>$arrReg, "arrAsean"=>$arrAsean, "arrChapter"=>$arrChapter, "arrLectures"=>$arrLectures), 
        ["title" => $this->title, "day" => $this->day]);
    }

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

        // Return to view
        return view("template.pages.landing", [
            "arrLanding" => $random9,
            "title" => "Philippine Statistical Association - 2025 ACA Gallery"
        ]);
    }
}
