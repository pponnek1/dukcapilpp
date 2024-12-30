<?php

namespace App\Http\Controllers;

use App\Models\Ambilantrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function show ()
    {
        if (request()->ajax()) {
            $data = DB::table('ambilantrians')
            ->join('antrians', 'ambilantrians.antrian_id', '=', 'antrians.id')
            ->select('ambilantrians.*', 'antrians.nama_layanan')->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('layanan', function($row) {
                    return $row->nama_layanan;
                })
                ->addColumn('nama_lengkap', function($row) {
                    return $row->nama_lengkap;
                })
                ->addColumn('nomorhp', function($row) {
                    return $row->nomorhp;
                })
                ->addColumn('alamat', function($row) {
                    return $row->alamat;
                })
                ->make(true);
        }
        return view('dashboard.laporan');
    }

    public function download()
    {
        $antrians = DB::table('ambilantrians')
            ->join('antrians', 'ambilantrians.antrian_id', '=', 'antrians.id')
            ->select('ambilantrians.id', 'antrians.nama_layanan', 'ambilantrians.nama_lengkap', 'ambilantrians.nomorhp', 'ambilantrians.alamat', 'ambilantrians.created_at')
            ->get();

        $fileName = 'laporan_antrian.csv';
        $csvData = "Nomor,ID,Nama Layanan,Nama,Nomor,Alamat,Created At\n";

        $no = 1;
        foreach ($antrians as $antrian) {
            $csvData .= "{$no},{$antrian->id},\"{$antrian->nama_layanan}\",\"{$antrian->nama_lengkap}\",\"{$antrian->nomorhp}\",\"{$antrian->alamat}\",\"{$antrian->created_at}\"\n";
            $no++;
        }
        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$fileName\"");
    }

    public function printPDF(Request $request)
    {
        // Lakukan query untuk mendapatkan data yang akan dicetak
        $data = DB::table('ambilantrians')
        ->join('antrians', 'ambilantrians.antrian_id', '=', 'antrians.id')
        ->select('ambilantrians.id', 'ambilantrians.tanggal', 'antrians.nama_layanan', 'ambilantrians.nama_lengkap', 'ambilantrians.nomorhp', 'ambilantrians.alamat', 'ambilantrians.created_at')
        ->get();
        // dd($data);
        // Render view ke dalam HTML



        return view('dashboard.pdf', compact('data'));

    }
}
