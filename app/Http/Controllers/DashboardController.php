<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Kelas;

use App\Models\Presensi;
use App\Models\Santri;


use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $as = Asrama::where('type_asrama', 'putra')->get();
        $asi = Asrama::where('type_asrama', 'putri')->get();
        $asrama = Asrama::count();
        $asramapr = Asrama::where('type_asrama', 'putri')->count();
        $asramalk = Asrama::where('type_asrama', 'putra')->count();
        $putra = Santri::count();
        $l = Santri::where('jenis_kelamin', 'L')->count();
        $p = Santri::where('jenis_kelamin', 'p')->count();
        $kelas = Kelas::all();
        return view('/dashboard', ['kelas' => $kelas, 'asi' => $asi, 'as' => $as, 'putra' => $putra, 'l' => $l, 'p' => $p, 'asrama' => $asrama, 'aspr' => $asramapr, 'aslk' => $asramalk]);
    }
    public function rekap(Kelas $kelas)
    {
        // $nama = Kelas::all();
        $asrama = Asrama::orderBy('nama_asrama')->get();
        $rekap = Presensi::latest();
        if (request('cari') || request('asrama') || request('keterangan')) {
            $req_asrama = request('asrama');
            $req_keterangan = request(('keterangan'));
            $rekap
                ->join('sesi_kelas', 'sesi_kelas.id', '=', 'absensi_kelas.sesi_id')
                ->join('kelassantri', 'kelassantri.id', '=', 'absensi_kelas.kelassantri_id')
                ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
                ->join('asrama', 'asrama.id', '=', 'asramasantri.asrama_id')
                ->join('kelas', 'kelas.id', '=', 'kelassantri.kelas_id')
                ->select('absensi_kelas.*', 'sesi_kelas.tgl')
                ->where('sesi_kelas.tgl', 'like', '%' . request('cari') . '%');
            if ($req_asrama != null) {
                $rekap->where('asrama.id', '=', (int) request('asrama'));
            }
            if ($req_keterangan != null) {
                $rekap->where('absensi_kelas.keterangan', '=', request('keterangan'));
            }
        }
        return view('about', ['rekap' => $rekap->get(), 'asrama' => $asrama, 'kelas' => $kelas]);
    }
}