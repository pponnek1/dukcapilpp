<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ambilantrian;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormApiController extends Controller
{
    //  Proses Store
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'tanggal'       => 'required',
            'nama_lengkap'  => 'required',
            'alamat'        => 'required',
            'nomorhp'       => 'required',
            'antrian_id'    => 'required',
        ]);
    
        // Cari antrian berdasarkan ID
        $antrian = Antrian::findOrFail($validated['antrian_id']);
        $service_code = $antrian->kode;
    
        // Ambil record terakhir dari tabel Ambilantrian berdasarkan tanggal dan kode
        $last_record = Ambilantrian::where('tanggal', $validated['tanggal'])
            ->where('kode', 'like', $service_code.'%')
            ->orderBy('created_at', 'desc')
            ->first();
    
        // Jika record terakhir tidak ada, maka kode dimulai dari 001
        if (!$last_record) {
            $next_kode = '001';
        } else {
            // Parsing kode terakhir menjadi integer
            $last_kode_int = intval(substr($last_record->kode, -3));
            // Increment nilai integer dan padding kembali dengan 0
            $next_kode_int = str_pad(++$last_kode_int, 3, '0', STR_PAD_LEFT);
            $next_kode = $next_kode_int;
        }
        
        // Validasi untuk memastikan tidak terjadi duplikasi pada kode antrian pada tanggal yang sama
        $kode_antrian = $service_code . '-' . $next_kode;
        $existing_record = Ambilantrian::where('kode', $kode_antrian)->where('tanggal', $validated['tanggal'])->first();
        if ($existing_record) {
            return response()->json(['error' => 'Maaf, gagal mengambil antrian. Silahkan ambil di hari lain'], 409);
        }

        // Mengecek apakah jumlah antrian pada tabel ambilantrian
        $antrian_count = Ambilantrian::where('antrian_id', $validated['antrian_id'])
            ->where('tanggal', $validated['tanggal'])
            ->count();
    
        // Mengecek apakah jumlah antrian pada tabel antrian
        $batas_antrian = $antrian->batas_antrian;
    
        // Membandingkan data dari tabel ambilantrian(user) dengan tabel antrian(Admin) yang sudah ditentukan
        if ($antrian_count >= $batas_antrian) {
            return response()->json(['error' => 'Maaf, Antrian Sudah Penuh. Silahkan Coba Di Hari Lain'], 409);
        }
    
        // Gabungkan kode dari tabel Antrian dan integer baru untuk kode_antrian pada tabel Ambilantrian
        $next_kode_padded = str_pad($next_kode, 3, '0', STR_PAD_LEFT);
        $validated['kode'] = $service_code . '-' . $next_kode_padded;
    
        // Tambahkan user_id dan tanggal ke data yang divalidasi
        // $validated['user_id'] = $request->user()->id;
        $validated['user_id'] = $request->user()->id;
        $validated['tanggal'] = $validated['tanggal'];
    
        // Simpan data ke tabel Ambilantrian
       $data =  Ambilantrian::create($validated);
        if ($data){
            return response()->json(['success' => 'Berhasil Mengambil Antrian']);
        }
        
        return response()->json(['error' => 'Gagal Mengambil Data!']);
        // Return response JSON
    }
    
    public function detail()
    {
    
        // Ambil detail antrian berdasarkan user yang sedang login
        $detailAntrian = Ambilantrian::where('user_id', Auth::id())->get();
    
        // Return data sebagai JSON
        return response()->json([
            'message' => 'Data Berhasil Diambil!',
            'detailAntrian' => $detailAntrian
        ]);
    }
    
}
