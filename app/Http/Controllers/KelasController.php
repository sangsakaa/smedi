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
        $cari = Kelas::orderBy('jenjang', 'desc')->orderby('nama_kelas');
        if (request('cari')) {
            $cari->where('jenjang', 'like', '%' . request('cari') . '%')->orderBy('nama_kelas');
        }
        return view('admin/kelas/kelas', ['datakelas' => $cari->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editanggota(Kelas $kelas)
    {

        return view(' admin/kelas/editanggotakelas', ['kelas' => $kelas]);
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
            // 'jenjang' => 'required',
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
        $kelas->jenjang = $request->jenjang;
        $kelas->nama_kelas = $request->nama_kelas;
        // dd($kelas);
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
        $kelasSantri = Kelassantri::query()
            ->select('kelassantri.*')
            ->where('kelas_id', $kelas->id)
            ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
            ->join('santri', 'santri.id', '=', 'asramasantri.santri_id')
            ->orderBy('santri.nama_santri')
        ->paginate(20);
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
            'jenjang' => 'required',
        ]);
        Kelas::where('id', $kelas->id)
            ->update([
                'kode_kelas' => $request->kode_kelas,
                'jenjang' => $request->jenjang,
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
    

    public function index2()
    {
        $kelassantri = Asramasantri::orderBy('asramasantri_id')->get();
        return view('admin/kelas/listsantri', ['list' => $kelassantri]);
    }

    public function kolektifkelas()
    {
        $asrama = Kelas::orderby('nama_kelas')->get();
        $kelassantri = Asramasantri::leftJoin('kelassantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
            ->where('kelassantri.asramasantri_id', '=', null)->select('asramasantri.*')->get();
        return view('admin/kelas/kolektifkelas', ['list' => $kelassantri, 'asrama' => $asrama]);
    }


    public function tambahkelas(Request $request)
    {
        foreach ($request->asramasantri as $asramasantri) {
            // dd($request);
            $kelassantri = new Kelassantri();
            $kelassantri->asramasantri_id = $asramasantri;
            $kelassantri->kelas_id = $request->kelas_id;
            $kelassantri->save();
        }
        return redirect('/kelas/' . $request->kelas);
    }
    public function hapus(Kelassantri $kelassantri)
    {
        Kelassantri::destroy($kelassantri->id);
        // dd($kelassantri);
        return redirect()->back();
    }
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        // // dd($kelas);
        return redirect()->back()->with('delete');
    }
}