<?php

namespace App\Http\Controllers;

use App\Models\Asramasantri;
use App\Models\Kelassantri;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KelassantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $kelassantri = Asramasantri::orderBy('santri_id');
        return view('admin/kelas/listsantri', ['list' => $kelassantri]);
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
     * @param  \App\Models\Kelassantri  $kelassantri
     * @return \Illuminate\Http\Response
     */
    public function show(Kelassantri $kelassantri, $kela)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelassantri  $kelassantri
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelassantri $kelassantri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelassantri  $kelassantri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelassantri $kelassantri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelassantri  $kelassantri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelassantri $kelassantri)
    {
        Kelassantri::destroy($kelassantri->id);
        return redirect()->back();
    }
}