<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\StatusLaporan;
use App\Models\LaporanTerlibat;
use App\Models\LaporanSaksi;
use Carbon\Carbon;
// use Database\Seeders\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;

class LaporanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $jenis_pelanggaran = \App\Models\JenisPelanggaran::lazy()->chunk(3);
        $jabatan = \App\Models\Jabatan::all();
        $pilihan = \App\Models\Pilihan::all();
        return view('dashboard.lapor', compact('jenis_pelanggaran', 'jabatan', 'pilihan'));
    }

    public function list()
    {
        $laporan = Laporan::with('terlibat', 'saksi')->get();
        // dd($laporan->toArray());

        return view('dashboard.list', compact('laporan'));
    }

    public function add_post(Request $request)
    {
        return view('dashboard.list');
    }

    public function store(Request $request)
    {
        $laporan_terakhir_id = Laporan::orderBy('id', 'desc')->first() ? Laporan::orderBy('id', 'desc')->first()->id + 1 : 1;
        $tgl_skrng = Carbon::today();
        $no_laporan = 'WBS-20221027';
        $nomor_laporan = str_pad($laporan_terakhir_id, 4, '0', STR_PAD_LEFT);
        $nomor = 'WBS-' . $tgl_skrng->format('Ymd') . $nomor_laporan;
        // dd($no_laporan, 'WBS-'.$tgl_skrng->format('Ymd'). $nomor_laporan, $laporan_terakhir_id, $nomor_laporan);
        $status_laporan_id = StatusLaporan::where('status', 'Diterima')->first();
        $laporan = Laporan::create([
            'no_laporan' => $nomor,
            'jenis_pelanggaran_id' => implode(',', $request->jenis),
            'kejadian_pertama' => $request->kejadian_pertama,
            'status_laporan_id' => $status_laporan_id->id,
            'lokasi' => $request->lokasi,
            'nama_pelapor' => $request->nama_pelapor,
            'jabatan1' => $request->jabatan1,
            'jabatan2' => implode(',', $request->jabatan2),
            'jabatan3' => implode(',', $request->jabatan3),
            'kejadian' => $request->kejadian,
            'kerugian' => $request->kerugian,
            'jumlah_kerugian' => $request->jumlah_kerugian,
            'pernah' => $request->pernah,
            'jabatan_terlapor' => $request->jabatan_terlapor,
            'berbicara' => $request->berbicara,
            'jabatan4' => $request->jabatan4,
            'posisi' => $request->posisi,
        ]);

        foreach ($request->bukti as $index => $item) {
            $store = Storage::putFile('public', $item);
            $path = Storage::url($item->hashName());
            Bukti::create([
                'laporan_id' => $laporan->id,
                'file_bukti' => $path,
            ]);
        }


        foreach ($request->terlibat as $index => $item) {
            LaporanTerlibat::create([
                'laporan_id' => $laporan->id,
                'nama_terlibat' => $item,
                'jabatan_id' => $request->jabatan2[$index],
            ]);
        }
        foreach ($request->saksi as $index => $saksi) {
            LaporanSaksi::create([
                'laporan_id' => $laporan->id,
                'nama_saksi' => $saksi,
                'jabatan_saksi_id' => $request->jabatan3[$index],
            ]);
        }

        return redirect('/list');
    }

    public function create()
    {
        return view('dashboard.lapor');
    }


    public function diterima($id)
    {
        $data = DB::table('laporan')
            ->join('laporan', 'status_laporan_id', '=', 'laporan.status_laporan_id')
            ->join('status_laporan', 'id', '=', 'status_laporan.id')
            ->select();
    }


    public function edit(Request $request)
    {

        $jenis_pelanggaran = \App\Models\JenisPelanggaran::lazy()->chunk(3);
        $jabatan = \App\Models\Jabatan::all();
        $laporan = \App\Models\Laporan::with('terlibat', 'saksi', 'bukti')->findOrFail($request->id);
        $pilihan = \App\Models\Pilihan::all();


        return view('dashboard.formedit', compact('jenis_pelanggaran', 'jabatan', 'laporan', 'pilihan'));
    }

    public function detail(Request $request)
    {
        $jenis_pelanggaran = \App\Models\JenisPelanggaran::lazy()->chunk(3);
        $jabatan = \App\Models\Jabatan::all();
        $laporan = \App\Models\Laporan::with('terlibat', 'saksi', 'bukti')->findOrFail($request->id);
        $pilihan = \App\Models\Pilihan::all();

        return view('dashboard.detail', compact('jenis_pelanggaran', 'jabatan', 'laporan', 'pilihan'));
    }



    public function update(Request $request)
    {
        $laporan = \App\Models\Laporan::findOrFail($request->id);
        $laporan->update([
            'jenis_pelanggaran_id' => implode(',', $request->jenis),
            'kejadian_pertama' => $request->kejadian_pertama,
            'lokasi' => $request->lokasi,
            'nama_pelapor' => $request->nama_pelapor,
            'jabatan1' => $request->jabatan1,
            'jabatan2' => implode(',', $request->jabatan2),
            'jabatan3' => implode(',', $request->jabatan3),
            'kejadian' => $request->kejadian,
            'kerugian' => $request->kerugian,
            'jumlah_kerugian' => $request->jumlah_kerugian,
            'pernah' => $request->pernah,
            'jabatan_terlapor' => $request->jabatan_terlapor,
            'berbicara' => $request->berbicara,
            'jabatan4' => $request->jabatan4,
            'posisi' => $request->posisi,
        ]);

        LaporanTerlibat::where('laporan_id', $laporan->id)->delete();
        foreach ($request->terlibat as $index => $item) {
            LaporanTerlibat::where('laporan_id', $laporan->id)->create([
                'laporan_id' => $laporan->id,
                'nama_terlibat' => $item,
                'jabatan_id' => $request->jabatan2[$index],
            ]);
        }

        LaporanSaksi::where('laporan_id', $laporan->id)->delete();
        foreach ($request->saksi as $index => $saksi) {
            LaporanSaksi::where('laporan_id', $laporan->id)->create([
                'laporan_id' => $laporan->id,
                'nama_saksi' => $saksi,
                'jabatan_saksi_id' => $request->jabatan3[$index],
            ]);
        }
        return redirect('/list');
    }

    public function profil_edit(Request $request)
    {
        //
    }
}
