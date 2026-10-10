
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>

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
            max-width: 1150px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 20px #0f172a12;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        h1 { margin: 0 0 8px; font-size: 28px; }
        .subtitle { color: #64748b; margin: 0; }

        a, button {
            font-family: inherit;
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 7px;
            padding: 10px 14px;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary { background: #2563eb; }
        .btn-info { background: #0891b2; }
        .btn-warning { background: #d97706; }
        .btn-danger { background: #dc2626; }
        .btn:hover { opacity: .82; }

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 7px;
            background: #dcfce7;
            color: #166534;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #1d4ed8;
            color: white;
            padding: 14px 12px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:hover { background: #eff6ff; }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 30px;
        }

        @media (max-width: 600px) {
            .container { padding: 18px; }
            h1 { font-size: 23px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>Inventaris Barang</h1>
                <p class="subtitle">Kelola data barang dan kategori inventaris.</p>
            </div>

            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                + Tambah Barang
            </a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->kode_barang }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->kategori->nama_kategori }}</td>
                            <td>{{ $barang->jumlah }}</td>
                            <td>
                                <span class="badge">
                                    {{ $barang->kondisi }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('barang.show', $barang->id) }}"
                                       class="btn btn-info">Detail</a>

                                    <a href="{{ route('barang.edit', $barang->id) }}"
                                       class="btn btn-warning">Edit</a>

                                    <form action="{{ route('barang.destroy', $barang->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada data barang. Klik tombol Tambah Barang untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
