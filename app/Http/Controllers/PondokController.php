<?php

namespace App\Http\Controllers;

use App\Models\Pondok;
use Illuminate\Http\Request;

class PondokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pondok = Pondok::all();
        return view('admin/pondok/pondok', ['pondok' => $pondok]);
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
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function show(Pondok $pondok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pondok $pondok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pondok $pondok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pondok $pondok)
    {
        //
    }
}