<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\SuratIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SuratizinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bln = $array_bln[date('n')];       
        $santri = Santri::find($request->id)->first();
        return view('admin/santri/suratizin',['santri'=>$santri,'bulan'=>$bln]);
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
     * @param  \App\Models\SuratIzin  $suratIzin
     * @return \Illuminate\Http\Response
     */
    public function show(SuratIzin $suratIzin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratIzin  $suratIzin
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratIzin $suratIzin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratIzin  $suratIzin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratIzin $suratIzin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratIzin  $suratIzin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratIzin $suratIzin)
    {
        //
    }
}