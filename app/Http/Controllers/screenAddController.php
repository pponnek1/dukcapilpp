<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class screenAddController extends Controller
{
    public function index()
    {
        $antrianList = Antrian::all();

    return view('index', [
        'antrianList' => $antrianList,
    ]);
    }
}
