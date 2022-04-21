<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Santri;
use App\Models\Jabatan;
use App\Models\Penugasan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Penugasan::paginate(4);
        $santri = Santri::all();
        $jabatan = Jabatan::all();
        $asrama = Asrama::all();
        return view('admin/pengurus/pengurus',['asrama'=>$asrama,'jabatan'=>$jabatan,'pengurus'=>$pengurus,'santri'=>$santri]); 
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
            'asrama_id'=>'required',            
            'jabatan_id'=>'required',            
        ]);  
        $pengurus = New Penugasan;
        $pengurus->santri_id = $request->santri_id;
        $pengurus->jabatan_id = $request->jabatan_id;
        $pengurus->asrama_id = $request->asrama_id;
        $pengurus->save();
        return redirect()->back()->with('success', 'hehehe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function show(Penugasan $penugasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penugasan $penugasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penugasan $penugasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penugasan $penugasan)
    {
        Penugasan::destroy($penugasan->id);
        return redirect()->back();
    }
}