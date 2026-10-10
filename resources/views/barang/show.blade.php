
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang - Inventaris</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 16px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: 750px;
            margin: 25px auto;
            padding: 30px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 20px #0f172a12;
        }

        .header {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            color: #64748b;
            margin: 0;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }

        td:first-child {
            width: 40%;
            color: #64748b;
            font-weight: 600;
        }

        td:last-child {
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 7px;
            color: white;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-primary { background: #2563eb; }
        .btn-secondary { background: #64748b; }
        .btn:hover { opacity: .82; }

        @media (max-width: 500px) {
            .container { padding: 20px; }
            td:first-child { width: 38%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Barang</h1>
            <p class="subtitle">Informasi lengkap barang inventaris.</p>
        </div>

        <table>
            <tr>
                <td>Kode Barang</td>
                <td>{{ $barang->kode_barang }}</td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>{{ $barang->nama_barang }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>{{ $barang->kategori->nama_kategori }}</td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>{{ $barang->jumlah }}</td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td><span class="badge">{{ $barang->kondisi }}</span></td>
            </tr>
            <tr>
                <td>Dibuat</td>
                <td>{{ $barang->created_at?->format('d-m-Y H:i') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Terakhir Diperbarui</td>
                <td>{{ $barang->updated_at?->format('d-m-Y H:i') ?? '-' }}</td>
            </tr>
        </table>

        <div class="actions">
            <a href="{{ route('barang.edit', $barang->id) }}"
               class="btn btn-primary">Edit Barang</a>

            <a href="{{ route('barang.index') }}"
               class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
</body>
</html>
