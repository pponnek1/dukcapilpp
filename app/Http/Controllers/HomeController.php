<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Ambilantrian;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $antrianList = Antrian::all();
        $layananList = Layanan::all();
        $orangAntri = Ambilantrian::whereDate('tanggal', Carbon::today())->get();

        // Menghitung jumlah layanan
        $jumlahAntrianBuka = $antrianList->count();
        $jumlahLayanan = $layananList->count();
        $jumlahOrangAntri = $orangAntri->count();

        return view('/dashboard/index', [
            'antrianList' => $antrianList,
            'jumlahAntrianBuka' => $jumlahAntrianBuka,
            'jumlahLayanan' => $jumlahLayanan,
            'jumlahOrangAntri' => $jumlahOrangAntri,
        ]);
    }

}
