<?php

namespace App\Http\Controllers;

use App\Sign;
use Illuminate\Http\Request;
use App\Upload;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $upload = Upload::find(1);
        // dd($upload);

        $request->validate([
            'signs-file' => 'required|mimes:csv,txt',
        ]);

        $upload = $request->file('signs-file');
        $filePath = $upload->getRealPath();

        $data = file_get_contents($upload);

        $file = fopen($filePath, 'r');


        while (($data = fgetcsv($file, 1000, "|")) !== FALSE){
            
            $sign = new Sign;
            $sign->sign_icon = $data[0];
            $sign->sign = $data[1];
            $sign->date_from = $data[2];
            $sign->date_to = $data[3];
            // dd($sign);

            $sign->save();
        }
        
        return redirect()->route('sign.index')->with('message', 'File uploaded successfully!');
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