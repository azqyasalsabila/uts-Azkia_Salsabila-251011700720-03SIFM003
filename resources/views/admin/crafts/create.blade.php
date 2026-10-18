<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | RuangKarya</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #faf8f3;
            color: #333;
            margin: 0;
        }

        header {
            background: #39291f;
            color: white;
            padding: 22px 7%;
        }

        header a {
            color: #f3d7b5;
            text-decoration: none;
        }

        main {
            max-width: 700px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #0000000b;
        }

        h1 { color: #59391f; margin-top: 0; }

        label {
            display: block;
            font-weight: bold;
            margin: 18px 0 8px;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 6px;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
            margin-top: 22px;
        }

        .save { background: #7b4b2a; color: white; }
        .cancel { background: #eee; color: #333; margin-left: 8px; }

        .hint {
            color: #777;
            font-size: 13px;
            margin-top: 6px;
        }
    </style>
</head>

<body>
<header>
    <h2>RuangKarya — Admin</h2>
    <a href="{{ route('admin.crafts.index') }}">← Kembali ke daftar produk</a>
</header>

<main>
    <div class="form-card">
        <h1>Tambah Produk Baru</h1>
        <p>Lengkapi informasi kerajinan yang ingin ditampilkan.</p>

        @if ($errors->any())
            <div class="error">
                <p>Periksa kembali data berikut:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.crafts.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label for="name">Nama Produk</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Tas Anyaman Bambu"
                required
            >

            <label for="artisan">Nama Pengrajin</label>
            <input
                id="artisan"
                type="text"
                name="artisan"
                value="{{ old('artisan') }}"
                placeholder="Nama pengrajin atau usaha"
                required
            >

            <label for="category">Kategori</label>
            <select id="category" name="category" required>
                <option value="">-- Pilih kategori --</option>
                <option value="Aksesoris" @selected(old('category') === 'Aksesoris')>Aksesoris</option>
                <option value="Dekorasi" @selected(old('category') === 'Dekorasi')>Dekorasi</option>
                <option value="Pakaian" @selected(old('category') === 'Pakaian')>Pakaian</option>
                <option value="Peralatan Rumah" @selected(old('category') === 'Peralatan Rumah')>Peralatan Rumah</option>
                <option value="Lainnya" @selected(old('category') === 'Lainnya')>Lainnya</option>
            </select>

            <label for="material">Bahan Kerajinan</label>
            <input
                id="material"
                type="text"
                name="material"
                value="{{ old('material') }}"
                placeholder="Contoh: Bambu"
                required
            >

            <label for="description">Deskripsi Produk</label>
            <textarea
                id="description"
                name="description"
                placeholder="Jelaskan produk kerajinan ini..."
                required
            >{{ old('description') }}</textarea>

            <label for="price">Harga (Rp)</label>
            <input
                id="price"
                type="number"
                name="price"
                min="0"
                step="0.01"
                value="{{ old('price') }}"
                placeholder="Contoh: 150000"
                required
            >

            <label for="image">Foto Produk</label>
            <input
                id="image"
                type="file"
                name="image"
                accept="image/jpeg,image/png,image/jpg,image/webp"
                required
            >
            <p class="hint">
                Pilih foto berformat JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
            </p>

            <button type="submit" class="button save">Simpan Produk</button>
            <a href="{{ route('admin.crafts.index') }}" class="button cancel">Batal</a>
        </form>
    </div>
</main>
</body>
</html>
