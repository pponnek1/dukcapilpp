<!DOCTYPE html>
<html>
<head>
    <title>Nomor Antrian Disdukcapil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 15px;
        }
        .nomor-antrian {
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            border: 2px solid black;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="data:image/png;base64,{{ $logo }}" alt="Logo Instansi" width="100" height="100">
        </div>
        <h1>Dinas Kependudukan dan Pencatatan Sipil</h1>
        <p style="text-align: center;">Kabupaten Klaten, Jawa Tengah</p>
        <hr>
        <h3 style="text-align: center;">Nomor Antrian</h3>
        <div class="nomor-antrian">{{ $cetakKodeAntrian->kode }}</div>
        <h3 style="text-align: center;">
            Tanggal Kedatangan: {{ date('d-m-Y', strtotime($cetakKodeAntrian->tanggal)) }}
        </h3>
        <hr>
        <p style="text-align: center;">Harap Datang Pada Tanggal yang Sudah Dipilih</p>
    </div>
</body>
</html>
