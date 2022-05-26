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

        } else {
            return response()->json([
                'horoscopes' => [], //prendo la relazione 
                'success' => true,
            ]);
        }

        $sign = $signs->first();

        return response()->json([
            'sign_icon' => $sign->sign_icon,
            'sign' => $sign->sign,
            'horoscopes' => $sign->uploads()->orderBy('date')->with('sign')->paginate(21), //prendo la relazione 
            'success' => true,
        ]);
    }
}
