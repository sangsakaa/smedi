<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Asramasantri;
use App\Models\Kelas;
use App\Models\Kelassantri;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cari = Kelas::orderBy('id', 'asc');
        if (request('cari')) {
            $cari->where('nama_kelas', 'like', '%' . request('cari') . '%');
        }
        return view('admin/kelas/kelas', ['kelas' => $cari->get()]);
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

            'nama_kelas' => 'required',
        ]);
        $kelas_akhir = Kelas::orderBy('id', 'desc')->first();
        if (is_null($kelas_akhir)) {
            $kode_kelas = 'K' . '001';
        } else {
            $kode_akhir = $kelas_akhir->kode_kelas;
            $nomor = (int) substr($kode_akhir, -3); // 2013002 -> 003
            $nomor = $nomor + 1;
            $kode_kelas = 'K' . str_pad($nomor, 3, '0', STR_PAD_LEFT); // 4 -> 004

        }
        $kelas = new Kelas;
        $kelas->kode_kelas = $kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect()->back();
    }
    public function kelasstore(Request $request)
    {
        $request->validate([
            'asramasantri_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $kelas = new Kelassantri();
        $kelas->asramasantri_id = $request->asramasantri_id;
        $kelas->kelas_id = $request->kelas_id;
        $kelas->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas, Asrama $asrama)
    {

        $dataAsrama = Asrama::all();
        $dataSantri = Santri::all();
        $asramasantri = Asramasantri::all();
        $kelasSantri = Kelassantri::where('kelas_id', $kelas->id)->get();
        $dataKelas = Kelas::all();
        return view('admin/kelas/detailKelas', ['list' => $dataAsrama, 'dataSantri' => $dataSantri, 'asrama' => $asrama, 'datakelas' => $dataKelas, 'kelas' => $kelas, 'DataAsrama' => $asramasantri, 'kelasSantri' => $kelasSantri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('admin/kelas/editkelas', ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
        ]);
        Kelas::where('id', $kelas->id)
            ->update([
                'kode_kelas' => $request->kode_kelas,
                'nama_kelas' => $request->nama_kelas,
            ]);
        return redirect('/kelas')->with('success', 'Data Asrama berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect()->back();
    }
}