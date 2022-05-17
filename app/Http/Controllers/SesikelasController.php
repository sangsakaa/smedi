<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\Sesikelas;
use Illuminate\Http\Request;

class SesikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesikelas = Sesikelas::all();
        $kelas = Kelas::all();
        return view('admin/presensi/absen',['kelas'=>$kelas,'sesi'=>$sesikelas]);
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
            'tgl'=>'required',
            'kelas_id'=>'required',
        ]);
        
        $sesikelas = New Sesikelas();
        $sesikelas->tgl = $request->tgl;
        $sesikelas->kelas_id = $request->kelas_id;
        $sesikelas->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesikelas  $sesikelas
     * @return \Illuminate\Http\Response
     */
    public function show(Sesikelas $sesikelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesikelas  $sesikelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesikelas $sesikelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesikelas  $sesikelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesikelas $sesikelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesikelas  $sesikelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesikelas $sesikelas)
    {
        //
    }

    public function absen(SesiKelas $sesi)
    {
        return view('admin/laporan/report', ['sesi' => $sesi]);
    }
    public function simpanabsen(Request $request, SesiKelas $sesi)
    {
        foreach ($sesi->kelas->kelassantri as $pesertakelas) {
            $presensi = new Presensi();
            $presensi->sesi_id = $sesi->id;
            $presensi->santri_id = $pesertakelas->asramasantri->santri_id;
            //dd($request->keterangan);
            $presensi->keterangan = $request->keterangan[$pesertakelas->asramasantri_id];
            $presensi->save();
        }
        return redirect()->back();
    }
}