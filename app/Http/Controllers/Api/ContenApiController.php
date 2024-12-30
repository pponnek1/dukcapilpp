<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ambilantrian;
use App\Models\Antrian;
use Illuminate\Http\Request;

class ContenApiController extends Controller
{

    public function getListLayanan_tersedia()
    {
        $data = Antrian::all();
        $count = $data->count();
        return response()->json([
            [
                'status' => 200,
                'message' => 'success',
                'data' => [
                    'jumlah' => $count,
                    'body' => $data,
                ]
            ]
        ]);
    }

    public function getDataPendaftarAntrian(Request $request)
    {
        $id = $request->query('id');
        $antrian = Ambilantrian::where('antrian_id', $id)
            ->get();

        if ($antrian->isEmpty()) {
            return response()->json(['message' => 'Tidak ada antrian yang ditemukan'], 404);
        }

        return response()->json([
            "message" => "Data Berhasil Diambil!",
            "status" => 200,
            "body" => $antrian
        ]);
    }
}
