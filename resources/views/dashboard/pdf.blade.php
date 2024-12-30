<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center; /* Teks di tengah pada <th> */
        }

        .index-number {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Laporan Antrian</h1>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Lengkap</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Nomor</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel dari data yang diterima dari controller -->
            @foreach($data as $index => $row)
                <tr>
                    <td class="index-number">{{ $index + 1 }}</td>
                    <td>{{ $row->nama_lengkap }}</td>
                    <td>{{ $row->nama_layanan }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->nomorhp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Ketika halaman dimuat, langsung mencetak
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
