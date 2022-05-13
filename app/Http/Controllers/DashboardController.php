<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Dashboard;
use App\Models\Kelassantri;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  )
    {
    
    $as =Asrama::where('type_asrama','putra')->get();
    $asi =Asrama::where('type_asrama','putri')->get();
    $asrama =Asrama::count();
    $asramapr =Asrama::where('type_asrama','putri')->count();
    $asramalk =Asrama::where('type_asrama','putra')->count();
    $putra =Santri::count();
    $l = Santri::where('jenis_kelamin','L')->count();
    $p = Santri::where('jenis_kelamin','p')->count();
    $kelas = Kelassantri::count();
    return view('/dashboard',['kelas'=>$kelas,'asi'=>$asi,'as'=>$as,'putra'=>$putra,'l'=>$l,'p'=>$p,'asrama'=>$asrama,'aspr'=>$asramapr,'aslk'=>$asramalk]); 
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
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}