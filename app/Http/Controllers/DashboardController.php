<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Kelassantri;
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
        $kelas = Kelassantri::count();
        return view('/dashboard', ['kelas' => $kelas, 'asi' => $asi, 'as' => $as, 'putra' => $putra, 'l' => $l, 'p' => $p, 'asrama' => $asrama, 'aspr' => $asramapr, 'aslk' => $asramalk]);
    }
    public function rekap()
    {
        $rekap = Presensi::latest();
        if (request('cari')) {
            $rekap->where('created_at', 'like', '%' . request('cari') . '%');
        }
        return view('about', ['rekap' => $rekap->get()]);
    }
}