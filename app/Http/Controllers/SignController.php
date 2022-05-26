<?php

namespace App\Http\Controllers;

use App\Sign;
use Illuminate\Http\Request;
use App\Upload;

class SignController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'signs-file' => 'required|mimes:csv,txt',
        ]);

        $upload = $request->file('signs-file');
        $filePath = $upload->getRealPath();

        $data = file_get_contents($upload);

        $file = fopen($filePath, 'r');


        while (($data = fgetcsv($file, 1000, "|")) !== FALSE) {
            if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3])){
                continue;
            } 

            $sign = new Sign;
            $sign->sign_icon = $data[0];
            $sign->sign = $data[1];
            $sign->date_from = \Carbon\Carbon::createFromFormat('F d', $data[2])->year(2000);
            $sign->date_to = \Carbon\Carbon::createFromFormat('F d', $data[3])->year(2000);

            $sign->save();
            
        }
        
        return redirect()->route('upload.index')->with('message', 'File uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function show(Sign $sign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function edit(Sign $sign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sign $sign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sign $sign)
    {
        //
    }
}
