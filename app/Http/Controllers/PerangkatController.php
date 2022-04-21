<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perangkat = Perangkat::all();
        return view('admin/perangkat/perangkat',['dataPerangkat'=>$perangkat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/perangkat/addperangkat');
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
            'nama_perangkat'=>'',
            'tempat_lahir'=>'',
            'tgl_lahir'=>'',
            'jenis_kelamin'=>'',
            'agama'=>'',
            'alamat'=>'',
            'no_hp'=>'',
            'bank_id'=>'',
            'no_rekening'=>'',
        ]);
        $ustadz = New Perangkat();
        $ustadz->nama_perangkat = $request->nama_perangkat;
        $ustadz->jenis_kelamin = $request->jenis_kelamin;
        $ustadz->tempat_lahir = $request->tempat_lahir;
        $ustadz->tgl_lahir = $request->tgl_lahir;
        $ustadz->agama = $request->agama;
        $ustadz->no_hp = $request->no_hp;
        $ustadz->bank_id = $request->bank_id;
        $ustadz->no_rekening = $request->no_rekening;
        $ustadz->save();
        return redirect('perangkat')->with('succes','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Perangkat $perangkat)
    {
        
        return view('admin/perangkat/detailperangkat',['perangkat'=>$perangkat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Perangkat $perangkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perangkat $perangkat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perangkat $perangkat)
    {
        Perangkat::destroy($perangkat->id);
        return redirect()->back();
    }
}