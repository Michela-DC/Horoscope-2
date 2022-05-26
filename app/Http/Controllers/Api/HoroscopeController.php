<?php

namespace App\Http\Controllers\Api;
use App\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sign;

class HoroscopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $signs = Sign::query();

        $request->validate([
            'search' => 'nullable|date_format:Y-m-d',
        ]);

        if($request->has('search') && !empty($request->search)){
            $birthdate = \Carbon\Carbon::createFromFormat('Y-m-d', $request->search)->year(2000);
            $signs->where('date_from', '<', $birthdate)->where('date_to', '>', $birthdate);
            // dd($signs->get());
        } else {
            return response()->json([
                'horoscopes' => [], //prendo la relazione 
                'success' => true,
            ]);
        }

        $sign = $signs->first();

        return response()->json([
            'sign' => $sign->sign,
            'horoscopes' => $sign->uploads()->with('sign')->paginate(20), //prendo la relazione 
            'success' => true,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
