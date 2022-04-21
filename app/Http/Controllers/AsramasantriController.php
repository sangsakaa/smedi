<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Asramasantri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AsramasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $asrama = Asrama::where('id')->first();
        // return view('admin/asrama/asramasantri',['asrama'=>$asrama]);
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
        $request->validate([    
            'santri_id'=>'required','unique',
            'histori_id'=>'required',
            'asrama_id'=>'required',
            'tanggal_masuk'=>'',
            'tanggal_keluar'=>'',
        ]);      
        $asrama = New Asramasantri;
        $asrama->santri_id = $request->santri_id;
        $asrama->histori_id = $request->histori_id;
        $asrama->asrama_id = $request->asrama_id;
        $asrama->tanggal_masuk = $request->tanggal_masuk;
        $asrama->tanggal_keluar = $request->tanggal_keluar;
        $asrama->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asramasantri  $asramasantri
     * @return \Illuminate\Http\Response
     */
    public function show( Asramasantri $asramasantri )
    {
        // 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asramasantri  $asramasantri
     * @return \Illuminate\Http\Response
     */
    public function edit(Asramasantri $asramasantri)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asramasantri  $asramasantri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asramasantri $asramasantri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asramasantri  $asramasantri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asramasantri $asramasantri)
    {
        Asramasantri::destroy($asramasantri->id);
        return redirect()->back();
    }
}