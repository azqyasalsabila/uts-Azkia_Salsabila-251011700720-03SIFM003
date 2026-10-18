<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | RuangKarya</title>

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

        .current-image {
            width: 180px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
            background: #efe2d1;
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
        <h1>Edit Produk</h1>
        <p>Ubah informasi produk kerajinan di bawah ini.</p>

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
            action="{{ route('admin.crafts.update', $craft->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <label for="name">Nama Produk</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name', $craft->name) }}"
                required
            >

            <label for="artisan">Nama Pengrajin</label>
            <input
                id="artisan"
                type="text"
                name="artisan"
                value="{{ old('artisan', $craft->artisan) }}"
                required
            >

            <label for="category">Kategori</label>
            <select id="category" name="category" required>
                @foreach (['Aksesoris', 'Dekorasi', 'Pakaian', 'Peralatan Rumah', 'Lainnya'] as $category)
                    <option
                        value="{{ $category }}"
                        @selected(old('category', $craft->category) === $category)
                    >
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            <label for="material">Bahan Kerajinan</label>
            <input
                id="material"
                type="text"
                name="material"
                value="{{ old('material', $craft->material) }}"
                required
            >

            <label for="description">Deskripsi Produk</label>
            <textarea
                id="description"
                name="description"
                required
            >{{ old('description', $craft->description) }}</textarea>

            <label for="price">Harga (Rp)</label>
            <input
                id="price"
                type="number"
                name="price"
                min="0"
                step="0.01"
                value="{{ old('price', $craft->price) }}"
                required
            >

            <label>Foto Saat Ini</label>

            @if ($craft->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($craft->image))
                <img
                    class="current-image"
                    src="{{ asset('storage/' . $craft->image) }}"
                    alt="{{ $craft->name }}"
                >
            @else
                <p class="hint">Belum ada foto tersimpan melalui fitur upload.</p>
            @endif

            <label for="image">Ganti Foto Produk (opsional)</label>
            <input
                id="image"
                type="file"
                name="image"
                accept="image/jpeg,image/png,image/jpg,image/webp"
            >
            <p class="hint">
                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                Kosongkan jika tidak ingin mengganti foto.
            </p>

            <button type="submit" class="button save">Simpan Perubahan</button>
            <a href="{{ route('admin.crafts.index') }}" class="button cancel">Batal</a>
        </form>
    </div>
</main>
</body>
</html>
