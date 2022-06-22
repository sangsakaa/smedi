<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Santri;
use App\Models\Asramasantri;
use App\Models\Jabatan;
use App\Models\Penugasan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AsramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asrama = Asrama::orderBy('id');
        if (request('cari')) {
            $asrama->where('nama_asrama', 'like', '%' . request('cari') . '%')->orderBy('nama_asrama');
        }
        return view('admin/asrama/asrama', ['asrama' => $asrama->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

            'nama_asrama' => 'required',
            'type_asrama' => 'required',
            'kuota_asrama' => 'required',
            'ket_asrama' => 'required',
        ]);
        $asrama = new Asrama;
        $asrama->kode_asrama = $request->kode_asrama;
        $asrama->nama_asrama = $request->nama_asrama;
        $asrama->type_asrama = $request->type_asrama;
        $asrama->kuota_asrama = $request->kuota_asrama;
        $asrama->ket_asrama = $request->ket_asrama;


        $asrama->save();
        return redirect('asrama')->with('success', 'hehehe');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan, Asrama $asrama, Asramasantri $asramasantri, Santri $santri)
    {

        $listsantri = Santri::orderBy('nama_santri')->get();
        $listasrama = Asrama::all();
        $jabatan = Penugasan::where('asrama_id', $asrama->id)->get();
        $listpengurus = [];
        foreach ($jabatan as $pengurus) {
            $listpengurus[$pengurus->pengurusJabatan->nama_jabatan] = $pengurus;
        }
        $anggota = Asramasantri::where('asrama_id', $asrama->id)->orderBy('santri_id')->get();
        return view('admin/asrama/asramasantri', ['jabatan' => $jabatan, 'anggota' => $anggota, 'datasantri' => $listsantri, 'dataAsrama' => $listasrama, 'asramasantri' => $asramasantri, 'asrama' => $asrama, 'santri' => $santri, 'listpengurus' => $listpengurus]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function edit(Asrama $asrama)
    {
        return view('admin/asrama/editasrama', ['asrama' => $asrama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asrama $asrama)
    {
        $request->validate([
            'kode_asrama' => 'required',
            'nama_asrama' => 'required',
            'type_asrama' => 'required',
            'kuota_asrama' => 'required',
            'ket_asrama' => 'required',
        ]);
        Asrama::where('id', $asrama->id)
            ->update([
                'kode_asrama' => $request->kode_asrama,
                'nama_asrama' => $request->nama_asrama,
                'type_asrama' => $request->type_asrama,
                'kuota_asrama' => $request->kuota_asrama,
                'ket_asrama' => $request->ket_asrama,
            ]);
        return redirect('/asrama')->with('success', 'Data Asrama berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asrama $asrama)
    {
        Asrama::destroy($asrama->id);
        return redirect()->back()->with('delete');
    }
}