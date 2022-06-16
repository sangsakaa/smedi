<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use App\Models\Historipelanggaran;
use App\Models\Pelanggaran;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cari = Santri::orderBy('nama_santri');
        if (request('cari')) {
            $cari->where('nama_santri', 'like', '%' . request('cari') . '%')->orderBy('nama_santri');
        }
        return view('admin/santri/santri', ['listSantri' => $cari->get()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/santri/addsantri');
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
            'nama_santri' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'tanggal_masuk' => '',
            'agama' => '',
            'nama_ibu' => '',
            'asal_kota' => '',
        ]);
        $santri = new Santri;
        $santri->nis = $request->nis;
        $santri->nama_santri = $request->nama_santri;
        $santri->tanggal_masuk = $request->tanggal_masuk;
        $santri->jenis_kelamin = $request->jenis_kelamin;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->agama = $request->agama;
        $santri->nama_ibu = $request->nama_ibu;
        $santri->asal_kota = $request->asal_kota;
        $santri->save();
        return redirect('santri')->with('succes', 'ok');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        return view('admin/santri/detail', ['santri' => $santri]);
    }

    public function tampilkan(Santri $santri)
    {

        $datasantri = Santri::find($santri->id);
        $h = Histori::where('santri_id', $santri->id)->paginate(2);
        return view('admin/santri/histori', ['santri' => $santri, 'data' => $datasantri, 'h' => $h]);
    }
    public function surat(Santri $santri)
    {

        $datasantri = Santri::find($santri->id);
        $h = Histori::where('santri_id', $santri->id)->paginate(2);
        return view('admin/santri/suratizin', ['santri' => $santri, 'data' => $datasantri, 'h' => $h]);
    }
    public function buatstore(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'tanggal_masuk' => 'required',
            'status_pendaftaran' => 'required',
            'pondok_id' => 'required',
            'nis' => 'required',
        ]);
        $histori = new Histori;
        $histori->nis = $request->nis;
        $histori->santri_id = $request->santri_id;
        $histori->tanggal_masuk = $request->tanggal_masuk;
        $histori->status_pendaftaran = $request->status_pendaftaran;
        $histori->pondok_id = $request->pondok_id;
        $histori->save();
        return redirect()->back()->with('success', 'hehehe');
    }
    public function tampilkanpelanggaran(Historipelanggaran $historipelanggaran, Santri $santri)
    {
        $pelanggaran = Historipelanggaran::where('santri_id', $santri->id)->paginate(3);
        $santri = Santri::where('id', $santri->id)->first();
        $listSantri = Santri::where('id', $santri->id)->first();
        $list = Pelanggaran::all();
        return view('admin/santri/historipelanggaran', ['historipelanggaran' => $historipelanggaran, 'list' => $list, 'santri' => $santri, 'listSantri' => $listSantri, 'pelanggaran' => $pelanggaran]);
    }
    public function pelanggarantstore(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'waktu' => 'required',
            'keterangan' => 'required',
            'pelanggaran_id' => 'required',
        ]);
        $histori = new Historipelanggaran;
        $histori->santri_id = $request->santri_id;
        $histori->pelanggaran_id = $request->pelanggaran_id;
        $histori->waktu = $request->waktu;
        $histori->keterangan = $request->keterangan;
        $histori->save();
        return redirect()->back()->with('success', 'hehehe');
    }

    // public function histori(Histori $histori, Santri $santri )
    // {
    //     $santri = Santri::where('id',$santri->id)->first();
    //     $h = Histori::where('santri_id',$santri->id)->paginate(2);
    //     $pondok_id = histori::firstWhere('pondok_id', $santri->id);
    //     return view('admin/santri/histori',['histori'=>$histori,'santri'=>$santri ,'h'=>$h,'pondok'=>$pondok_id]); 
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        return view('admin/santri/editsantri', ['santri' => $santri]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $request->validate([
            'nama_santri' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'agama' => '',
            'nama_ibu' => '',
            'tanggal_masuk' => '',
        ]);
        Santri::where('id', $santri->id)
            ->update([

                'nis' => $request->nis,
                'nama_santri' => $request->nama_santri,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'nama_ibu' => $request->nama_ibu,
                'tanggal_masuk' => $request->tanggal_masuk,

            ]);
        return redirect('/santri')->with('success', 'Data Asrama berhasil diperbaharui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        Santri::destroy($santri->id);
        return redirect('santri')->with('error', 'ok cuy');
    }
}