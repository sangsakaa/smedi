<?php

namespace App\Http\Controllers;


use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggaran = Pelanggaran::all();
        return view('admin/pelanggaran/Pelanggaran',['pelanggaran'=>$pelanggaran]);
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
            'pelanggaran'=>'required',
            'level'=>'required',
            'poin'=>'required',
        ]);
        
        $pelanggaran = New Pelanggaran();
        $pelanggaran->pelanggaran = $request->pelanggaran;
        $pelanggaran->level = $request->level;
        $pelanggaran->poin = $request->poin;
        $pelanggaran->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggaran $pelanggaran)
    {
        
        return view('admin/santri/historipelanggaran',['pelanggaran'=>$pelanggaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        return view('admin/pelanggaran/editPelanggaran',['pelanggaran'=>$pelanggaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggaran $pelanggaran)
    {
       
        $request->validate([
            'pelanggaran'=>'required',
            'level'=>'required',
            'poin'=>'required', 
        ]);
        Pelanggaran::where('id', $pelanggaran->id)
            ->update([ 
                'pelanggaran' => $request->pelanggaran,
                'level' => $request->level,
                'poin' => $request->poin,
                
            ]);
        return redirect('/pelanggaran')->with('success', 'Data Asrama berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggaran $pelanggaran)
    {
        
        Pelanggaran::destroy($pelanggaran->id);
        return redirect('pelanggaran');
    }
}