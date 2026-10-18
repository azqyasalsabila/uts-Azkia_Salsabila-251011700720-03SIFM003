<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | RuangKarya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf8f3;
            color: #333;
        }

        header {
            background: #39291f;
            color: white;
            padding: 24px 6%;
        }

        header h1 {
            margin: 0 0 10px;
        }

        header a {
            color: #f3d7b5;
            text-decoration: none;
        }

        main {
            max-width: 1150px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 22px;
        }

        .top h2 {
            color: #59391f;
            margin: 0;
        }

        .button {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 11px 15px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .add {
            background: #7b4b2a;
            color: white;
        }

        .edit {
            background: #f1dfc9;
            color: #59391f;
        }

        .delete {
            background: #b42318;
            color: white;
        }

        .back {
            background: white;
            color: #59391f;
            border: 1px solid #ddd;
        }

        .success {
            background: #e3f5e8;
            color: #216e39;
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .table-wrap {
            background: white;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 4px 15px #0000000b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        th {
            background: #f5eadc;
            color: #59391f;
        }

        .product-image {
            width: 75px;
            height: 65px;
            object-fit: cover;
            border-radius: 7px;
            background: #efe2d1;
        }

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .empty {
            text-align: center;
            padding: 30px;
        }

        @media (max-width: 600px) {
            .top {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<header>
    <h1>RuangKarya — Admin</h1>
    <a href="{{ route('crafts.index') }}">← Kembali ke Beranda</a>
</header>

<main>
    <div class="top">
        <h2>Kelola Produk Kerajinan</h2>

        <a href="{{ route('admin.crafts.create') }}" class="button add">
            + Tambah Produk
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Pengrajin</th>
                    <th>Bahan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($crafts as $craft)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                         
                        @if ($craft->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($craft->image))
                            <img
                                class="product-image"
                                src="{{ asset('storage/' . $craft->image) }}"
                                alt="{{ $craft->name }}"
                            >
                        @elseif ($craft->image && file_exists(public_path('assets/images/' . $craft->image)))
                            <img
                                class="product-image"
                                src="{{ asset('assets/images/' . $craft->image) }}"
                                alt="{{ $craft->name }}"
                            >                                >
                        @else
                            <div class="product-placeholder">🏺</div>
                            <span>Belum ada foto</span>
                        @endif
                        </td>
                        <td>{{ $craft->name }}</td>
                        <td>{{ $craft->artisan }}</td>
                        <td>{{ $craft->material }}</td>

                        <td>
                            Rp {{ number_format($craft->price, 0, ',', '.') }}
                        </td>

                        <td>
                            <div class="actions">
                                <a
                                    href="{{ route('admin.crafts.edit', $craft->id) }}"
                                    class="button edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.crafts.destroy', $craft->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="button delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada produk. Klik Tambah Produk untuk memulai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
