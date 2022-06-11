<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\Sesikelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SesikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kelas = Kelas::orderBy('jejang')->get();
        $cari = Sesikelas::orderBy('kelas_id');
        if (request('cari')) {
            $cari->where('tgl', 'like', '%' . request('cari') . '%')->orderBy('kelas_id');
        }
        return view('admin/presensi/absen', ['kelas' => $kelas, 'sesi' => $cari->get()]);
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
            'tgl' => [
                'required',
                'date',
                'before_or_equal:now',
                Rule::unique('sesi_kelas')->where(fn ($query) => $query->where('kelas_id', $request->kelas_id))
            ],
            'kelas_id' => 'required',
        ]);

        $sesikelas = new Sesikelas();
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
    public function destroy(Sesikelas $absen)
    {
        // dd($absen);
        Sesikelas::destroy($absen->id);
        Presensi::where('sesi_id', $absen->id)->delete();
        return redirect()->back();
    }

    public function absen(SesiKelas $sesi)
    {
        $presensi = [];
        foreach ($sesi->presensi as $pr) {
            $presensi[$pr->kelassantri_id] = ['keterangan' => $pr->keterangan, 'alasan' => $pr->alasan];
        }
        $jumlahHadir = $sesi->presensi()->where('keterangan', 'Hadir')->count();
        $jumlahSakit = $sesi->presensi()->where('keterangan', 'Sakit')->count();
        $jumlahAlfa = $sesi->presensi()->where('keterangan', 'Alfa')->count();
        $total = $sesi->presensi()->count();
        //dd($presensi);
        return view('admin/laporan/report', ['sesi' => $sesi, 'presensi' => $presensi, 'jumlahHadir' => $jumlahHadir, 'jumlahSakit' => $jumlahSakit, 'jumlahAlfa' => $jumlahAlfa, 'total' => $total]);
    }

    public function simpanabsen(Request $request, SesiKelas $sesi)
    {
        foreach ($sesi->kelas->kelassantri  as $kelassantri) {
            $presensi = $sesi->presensi()->where('kelassantri_id', $kelassantri->id)->first();
            if ($presensi) {
                $presensi->keterangan = $request->keterangan[$presensi->kelassantri_id];
                $presensi->alasan = $request->alasan[$kelassantri->id];
                $presensi->save();
            } else {
                $presensi = new Presensi;
                $presensi->sesi_id = $sesi->id;
                $presensi->kelassantri_id = $kelassantri->id;
                //dd($request->keterangan);
                $presensi->keterangan = $request->keterangan[$kelassantri->id];
                $presensi->alasan = $request->alasan[$kelassantri->id];
                $presensi->save();
            }
        }
        return redirect()->back();
    }
}