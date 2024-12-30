<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use Illuminate\Http\Request;

class ScreenApi extends Controller
{
    public function index(Antrian $antrian)
    {
        $kode = $antrian->kode;

        return response()->json([
            'antrianList'   => Antrian::all(),
            'antrian'       => $antrian,
            'kode'          => $kode,
        ]);
    }
}
