<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use App\Models\Santri;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use App\Models\Historipelanggaran;
use Illuminate\Routing\Controller;

class HistoripelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        
        return view('admin/santri/historipelanggaran');
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
            'santri_id'=>'required',
            'waktu'=>'required',           
            'keterangan'=>'required',            
            'pelanggaran_id'=>'required',            
        ]);  
        $histori = New Historipelanggaran;
        $histori->santri_id = $request->santri_id;
        $histori->pelanggaran_id = $request->pelanggaran_id;
        $histori->waktu = $request->waktu;
        $histori->keterangan = $request->keterangan;
        $histori->save();
        return redirect()->back()->with('success', 'hehehe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historipelanggaran  $historipelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Historipelanggaran $historipelanggaran ,Santri $santri)
    {
        $pelanggaran = Historipelanggaran::where('santri_id',$santri->id)->paginate(3);
        $santri = Santri::where('id',$santri->id)->first();
        $listSantri = Santri::where('id',$santri->id)->first();
        $list = Pelanggaran::where('id',$santri->id)->first();
        return view('admin/santri/historipelanggaran',['historipelanggaran'=>$historipelanggaran, 'list'=>$list,'santri'=>$santri,'listSantri'=>$listSantri,'pelanggaran'=>$pelanggaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historipelanggaran  $historipelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Historipelanggaran $historipelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historipelanggaran  $historipelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historipelanggaran $historipelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historipelanggaran  $historipelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historipelanggaran $historipelanggaran)
    
    {
        Historipelanggaran::destroy($historipelanggaran->id);
        return redirect()->back();
    }
    
}