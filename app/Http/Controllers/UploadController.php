<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // FARE VALIDAZIONE E CONTROLLI
        $request->validate([
            'csv-file' => 'required|mimes:csv,txt',
        ]);

        $upload = $request->file('csv-file');
        $filePath = $upload->getRealPath();

        $data = file_get_contents($upload);

        $file = fopen($filePath, 'r');


        while (($data = fgetcsv($file, 1000, "|")) !== FALSE){
            // dd($data);
            $upload = new Upload;
            $upload->text = $data[1];
            $upload->date = \Carbon\Carbon::createFromFormat('d-m-Y', $data[2])->format('Y-m-d');
            $upload->sign = $data[3];

            $upload->save();
        }
        
        return redirect()->route('upload.index')->with('message', 'File uploaded successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}

