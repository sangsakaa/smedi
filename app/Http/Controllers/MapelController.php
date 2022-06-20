<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cari = Mapel::latest();
        if (request('cari')) {
            $cari->where('nama_mapel', 'like', '%' . request('cari') . '%');
        }
        return view('admin/mapel/mapel', ['datamapel' => $cari->get()]);
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
            'nama_mapel' => 'required',
            'keterangan' => 'required',
        ]);
        $kelas_akhir = Mapel::orderBy('id', 'desc')->first();
        if (is_null($kelas_akhir)) {
            $kode_mapel = 'M' . '001';
        } else {
            $kode_akhir = $kelas_akhir->kode_mapel;
            $nomor = (int) substr($kode_akhir, -3); // 2013002 -> 003
            $nomor = $nomor + 1;
            $kode_mapel = 'M' . str_pad($nomor, 3, '0', STR_PAD_LEFT); // 4 -> 004

        }
        $mapel = new Mapel;
        $mapel->kode_mapel = $kode_mapel;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->keterangan = $request->keterangan;
        $mapel->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        return view('admin/mapel/detailmapel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('admin/mapel/editmapel', ['mapel' => $mapel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'keterangan' => 'required',
        ]);
        Mapel::where('id', $mapel->id)
            ->update([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'keterangan' => $request->keterangan,
            ]);
        return redirect('/mapel')->with('success', 'Data Asrama berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        Mapel::destroy($mapel->id);
        return redirect()->back();
    }
}