<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Daftar Produk</title>
    <style>
        /* CSS Klasik untuk merapikan cetakan PDF */
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; color: #333; }
        .date { text-align: right; color: #666; font-size: 12px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>

    <h2>LAPORAN INVENTARIS PRODUK<br>TokoKita.com</h2>

    <div class="date">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Judul Buku</th>
                <th width="30%">Pengarang</th>
                <th width="25%">Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->Judul }}</td>
                    <td class="text-right">{{ $item->Pengarang }}</td>
                    <td class="text-center">{{ $item->Tahun_terbit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>