<?php

namespace App\Http\Controllers;

use App\Models\Asramasantri;
use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\Sesikelas;
use App\Models\Kelassantri;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SesikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kelas = Kelas::orderBy('jenjang', 'desc')->orderby('nama_kelas')->get();
        $cari = Sesikelas::query()
            ->select('sesi_kelas.*')
            ->join('kelas', 'kelas.id', '=', 'sesi_kelas.kelas_id')
            ->orderBy('sesi_kelas.tgl', 'desc')
            ->orderBy('kelas.jenjang')
            ->orderBy('kelas.nama_kelas');
        if (request('cari')) {
            $cari->where('tgl', 'like', '%' . request('cari') . '%');
        }
        return view('admin/presensi/absen', ['kelas' => $kelas, 'sesi' => $cari->paginate(15)]);
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
        return redirect()->back()->with('succes', 'Sesi Berhasil ditambahkan');
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
        return redirect()->back()->with('error', 'Sesi Ini sudah berhasil di hapus');
    }

    public function absen(SesiKelas $sesi)
    {
        $presensi = [];
        foreach ($sesi->presensi as $pr) {
            $presensi[$pr->kelassantri_id] = ['keterangan' => $pr->keterangan, 'alasan' => $pr->alasan];
        }
        $jumlahHadir = $sesi->presensi()->where('keterangan', 'Hadir')->count();
        $jumlahIzin = $sesi->presensi()->where('keterangan', 'Izin')->count();
        $jumlahSakit = $sesi->presensi()->where('keterangan', 'Sakit')->count();
        $jumlahAlfa = $sesi->presensi()->where('keterangan', 'Alfa')->count();
        $total = $sesi->presensi()->count();
        //dd($presensi);

        $liskelassantri = Kelassantri::query()
            ->select('kelassantri.*')
            ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
            ->join('santri', 'santri.id', '=', 'asramasantri.santri_id')
            ->where('kelassantri.kelas_id', $sesi->kelas->id)
            ->orderBy('santri.nama_santri')
            ->get();

        return view('admin/laporan/report', ['sesi' => $sesi, 'liskelassantri' => $liskelassantri, 'presensi' => $presensi, 'jumlahHadir' => $jumlahHadir, 'jumlahSakit' => $jumlahSakit, 'jumlahAlfa' => $jumlahAlfa, 'jumlahIzin' => $jumlahIzin, 'total' => $total]);
    }

    public function simpanabsen(Request $request, SesiKelas $sesi)
    {
        foreach ($sesi->kelas->kelassantri  as $kelassantri) {
            $presensi = $sesi->presensi()->where('kelassantri_id', $kelassantri->id)->first();
            if ($presensi) {
                $presensi->keterangan = $request->keterangan[$presensi->kelassantri_id];
                $presensi->alasan = $request->alasan[$kelassantri->id];
                $presensi->save();
            } else if (array_key_exists($kelassantri->id, $request->keterangan)) {
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
    public function rekapitulasi()
    {
        $rekapitulasi = DB::table('absensi_kelas')
            ->join('kelassantri', 'kelassantri.id', '=', 'absensi_kelas.kelassantri_id')
            ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
            ->join('asrama', 'asrama.id', '=', 'asramasantri.asrama_id')
            ->join('kelas', 'kelas.id', '=', 'kelassantri.kelas_id')
            ->join('santri', 'santri.id', '=', 'asramasantri.santri_id')
            ->selectRaw("kelassantri_id, asrama.nama_asrama, kelas.nama_kelas, santri.nama_santri,santri.jenis_kelamin,  COUNT(CASE WHEN keterangan = 'Hadir' THEN 1 END) AS hadir, COUNT(CASE WHEN keterangan = 'Izin' THEN 1 END) AS izin, COUNT(CASE WHEN keterangan = 'Sakit' THEN 1 END) AS sakit, COUNT(CASE WHEN keterangan = 'Alfa' THEN 1 END) AS alfa")
            ->groupBy('kelassantri_id', 'nama_santri', 'jenis_kelamin', 'asrama.nama_asrama', 'kelas.nama_kelas')
            ->orderBy('kelas.nama_kelas')
            ->orderBy('santri.nama_santri')
            ->get();
        $date = DB::table('absensi_kelas')
            ->join('sesi_kelas', 'sesi_kelas.id', '=', 'absensi_kelas.sesi_id')
            ->selectRaw("MAX(sesi_kelas.tgl) AS max_date, MIN(sesi_kelas.tgl) AS min_date")
            ->first();
        return view('admin/presensi/rekapitulasi', ['rekapitulasi' => $rekapitulasi, 'date' => $date]);
    }

    public function rekapitulasiPerAsramaPerHari(Request $request)
    {
        $subQuery = DB::table('asramasantri')
            ->selectRaw('asrama_id, COUNT(id) AS jumlah_santri')
            ->groupBy('asrama_id')
            ->toSql();
        $lisrekap = DB::table('absensi_kelas')
            ->join('kelassantri', 'kelassantri.id', '=', 'absensi_kelas.kelassantri_id')
            ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')

            ->join('asrama', 'asrama.id', '=', 'asramasantri.asrama_id')
            ->join('sesi_kelas', 'sesi_kelas.id', '=', 'absensi_kelas.sesi_id')
            ->join(DB::raw("($subQuery) AS asrama_total"), 'asrama_total.asrama_id', '=', 'asrama.id')
            ->selectRaw("asrama.nama_asrama, COUNT(CASE WHEN keterangan = 'Hadir' THEN 1 END) AS hadir, COUNT(CASE WHEN keterangan = 'Izin' THEN 1 END) AS izin, COUNT(CASE WHEN keterangan = 'Sakit' THEN 1 END) AS sakit, COUNT(CASE WHEN keterangan = 'Alfa' THEN 1 END) AS alfa, COUNT(keterangan) AS total, asrama_total.jumlah_santri")
            ->groupByRaw('asrama.nama_asrama, asrama_total.jumlah_santri');
        if ($request->hari_terakhir) {
            $lisrekap->whereRaw('sesi_kelas.tgl = (SELECT MAX(tgl) FROM sesi_kelas)');
        } else if ($request->start_date && $request->end_date) {
            $lisrekap->whereRaw("sesi_kelas.tgl >= ? AND sesi_kelas.tgl <= ?", [$request->start_date, $request->end_date]);
        } else if ($request->start_date) {
            $lisrekap->whereRaw('sesi_kelas.tgl >= ?', [$request->start_date]);
        } else if ($request->end_date) {
            $lisrekap->whereRaw('sesi_kelas.tgl <= ?', [$request->end_date]);
        }

        $hasil = $lisrekap->orderBy('asrama.nama_asrama')
            ->get();
        return view('admin.presensi.rekapitulasiperasrama', ['lisrekap' => $hasil]);
    }
    public function blangko()
    {
        //dd(request('bulan'));
        $lisKelas = Kelas::orderBy('jenjang', 'desc')->orderBy('nama_kelas')->get();
        $kelas = Kelas::find(request('kelas'));
        $kelasSantri = Kelassantri::query()
            ->select('kelassantri.*')
            ->where('kelas_id', request('kelas'))
            ->join('asramasantri', 'asramasantri.id', '=', 'kelassantri.asramasantri_id')
            ->join('santri', 'asramasantri.santri_id', '=', 'santri.id')
            ->orderBy('nama_santri')
            ->get();
        $bulan = Carbon::parse(request('bulan'))->locale('id_ID');
        $periodeBulan = $bulan->startOfMonth()->daysUntil($bulan->copy()->endOfMonth());
        return view('admin/presensi/blangko', ['lisKelas' => $lisKelas, 'kelasSantri' => $kelasSantri, 'data_kelas' => $kelas, 'periodeBulan' => $periodeBulan, 'bulan' => $bulan]);
    }
}
