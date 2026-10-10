
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Inventaris</title>

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
            max-width: 650px;
            margin: 25px auto;
            padding: 30px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 20px #0f172a12;
        }

        h1 { margin: 0 0 8px; font-size: 27px; }

        .subtitle {
            color: #64748b;
            margin: 0 0 25px;
        }

        label {
            display: block;
            margin: 17px 0 7px;
            font-weight: 600;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 15px;
            background: white;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #2563eb20;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            color: white;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary { background: #2563eb; }
        .btn-secondary { background: #64748b; }
        .btn:hover { opacity: .82; }

        @media (max-width: 500px) {
            .container { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <p class="subtitle">Perbarui informasi barang inventaris.</p>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="kategori_id">Kategori Barang</label>
            <select id="kategori_id" name="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>

                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="kode_barang">Kode Barang</label>
            <input type="text" id="kode_barang" name="kode_barang"
                   value="{{ old('kode_barang', $barang->kode_barang) }}"
                   maxlength="50" required>
            @error('kode_barang')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang"
                   value="{{ old('nama_barang', $barang->nama_barang) }}"
                   maxlength="150" required>
            @error('nama_barang')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="jumlah">Jumlah Barang</label>
            <input type="number" id="jumlah" name="jumlah"
                   value="{{ old('jumlah', $barang->jumlah) }}"
                   min="0" required>
            @error('jumlah')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="kondisi">Kondisi Barang</label>
            <select id="kondisi" name="kondisi" required>
                @foreach (['Baik', 'Rusak', 'Perlu Perbaikan'] as $kondisi)
                    <option value="{{ $kondisi }}"
                        {{ old('kondisi', $barang->kondisi) == $kondisi ? 'selected' : '' }}>
                        {{ $kondisi }}
                    </option>
                @endforeach
            </select>
            @error('kondisi')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>
