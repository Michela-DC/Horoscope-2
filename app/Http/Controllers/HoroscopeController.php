<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horoscope;
use App\Sign;

class HoroscopeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'horoscopes-file' => 'required|mimes:csv,txt',
        ]);

        $upload = $request->file('horoscopes-file');
        $filePath = $upload->getRealPath();

        $data = file_get_contents($upload);

        $file = fopen($filePath, 'r');

        while (($data = fgetcsv($file, 1000, "|")) !== FALSE) {
            $horoscope = new Horoscope;
            $horoscope->sign_id = Sign::where('sign', $data[3])->first()->id;
            $horoscope->text = $data[1];
            $horoscope->text = $data[1];
            $horoscope->date = \Carbon\Carbon::createFromFormat('m-d-Y', $data[2]);

            $horoscope->save();
        }
        
        return redirect()->route('home');
    }
}
