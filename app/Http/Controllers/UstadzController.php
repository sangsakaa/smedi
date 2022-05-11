<?php

namespace App\Http\Controllers;

use App\Models\Ustadz;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class UstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cari = Ustadz::latest();
        if (request('cari')){
            $cari->where('nama_ustadz','like','%'.request('cari').'%');
        }
        
        return view('admin/ustadz/ustadz',['ustadz'=>$cari->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ustadz/addustadz');
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
            'nama_ustadz'=>'',
            'tempat_lahir'=>'',
            'tanggal_lahir'=>'',
            'jenis_kelamin'=>'',
            'tanggal_masuk'=>'',
            'agama'=>'',
            'alamat'=>'',
            'no_hp'=>'',
            'nama_bank'=>'',
            'no_rekening'=>'',
        ]);
        $santri_akhir = Ustadz::orderBy('id', 'desc')->first();   
        $a = date_create($request->tanggal_masuk);
        $c = date_format(date_create($request->tanggal_lahir),"dmY");
        $b = date_format($a,"Y");
        
        if (is_null($santri_akhir)) {
            $nig = $b . '000001';
        } else {
            $kode_akhir = $santri_akhir->nig;
            $nomor = (int) substr($kode_akhir, -6); // 2013002 -> 003
            $nomor = $nomor + 1;
            $nig = $b.$c . str_pad($nomor, 6, '0', STR_PAD_LEFT); // 4 -> 004
        }
        $ustadz = New Ustadz();
        $ustadz->nig = $nig;
        $ustadz->nama_ustadz = $request->nama_ustadz;
        $ustadz->tanggal_masuk = $request->tanggal_masuk;
        $ustadz->jenis_kelamin = $request->jenis_kelamin;
        $ustadz->tempat_lahir = $request->tempat_lahir;
        $ustadz->tanggal_lahir = $request->tanggal_lahir;
        $ustadz->agama = $request->agama;
        $ustadz->alamat = $request->alamat;
        $ustadz->no_hp = $request->no_hp;
        $ustadz->nama_bank = $request->nama_bank;
        $ustadz->no_rekening = $request->no_rekening;
        $ustadz->save();
        return redirect('ustadz')->with('succes','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function show(Ustadz $ustadz)
    {
        return view('admin/ustadz/detail',['ustadz'=>$ustadz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function edit(Ustadz $ustadz)
    {
        return view('admin/ustadz/editustadz',['ustadz'=>$ustadz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ustadz $ustadz)
    {
        $request->validate([
            'nama_ustadz'=>'',
            'tempat_lahir'=>'',
            'tanggal_lahir'=>'',
            'jenis_kelamin'=>'',
            'tanggal_masuk'=>'',
            'agama'=>'',
            'alamat'=>'',
            'no_hp'=>'',
            'nama_bank'=>'',
            'no_rekening'=>'',
        ]);
        Ustadz::where('id', $ustadz->id)
            ->update([
                
                'nama_ustadz' => $request->nama_ustadz,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_masuk' => $request->tanggal_masuk,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'nama_bank' => $request->nama_bank,
                'no_rekening' => $request->no_rekening,
                
                
            ]);
        return redirect('/ustadz')->with('success', 'Data Asrama berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ustadz $ustadz)
    {
        Ustadz::destroy($ustadz->id);
        return redirect()->back();
    }
}