<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Santri $santri )
    {
        $datasantri = Santri::find($santri->id);
        $h = Histori::paginate(3);
        return view('admin/santri/histori',['santri'=>$santri,'h'=>$h ,'data'=>$datasantri]);  
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
            'santri_id'=>'required',
            'tanggal_masuk'=>'required',
            'status_pendaftaran'=>'required',
            'pondok_id'=>'required',
            'nis'=>'required',          
        ]);  
        $histori = New Histori;
        $histori->nis = $request->nis;
        $histori->santri_id = $request->santri_id;
        $histori->tanggal_masuk = $request->tanggal_masuk;
        $histori->status_pendaftaran = $request->status_pendaftaran;
        $histori->pondok_id = $request->pondok_id;
        $histori->save();
        return redirect()->back()->with('success', 'hehehe');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function show(Histori $histori ,Santri $santri)
    {
        // $santri = Santri::where('id',$santri->id)->first();
        // $h = Histori::where('santri_id',$santri->id)->paginate(2);
        // $pondok_id = histori::firstWhere('pondok_id', $santri->id);
        // return view('admin/santri/histori',['histori'=>$histori,'santri'=>$santri,'h'=>$h,'pondok'=>$pondok_id]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function edit(Histori $histori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histori $histori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histori $histori)
    {
        Histori::destroy($histori->id);
        return redirect()->back();
    }   
}