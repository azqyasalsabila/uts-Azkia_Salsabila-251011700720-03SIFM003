<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RuangKarya | Marketplace Kerajinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf8f3;
            color: #333;
        }

        nav {
            background: #fff;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px #0000000d;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #7b4b2a;
        }

        nav a {
            color: #444;
            text-decoration: none;
            margin-left: 20px;
        }

        .hero {
            background: linear-gradient(120deg, #ead7bd, #f8eee0);
            padding: 65px 7%;
        }

        .hero h1 {
            font-size: 38px;
            color: #59391f;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.7;
            max-width: 600px;
            margin-bottom: 25px;
        }

        .hero a {
            display: inline-block;
            background: #7b4b2a;
            color: white;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 7px;
        }

        .container {
            padding: 45px 7%;
        }

        .section-title {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .search {
            width: 100%;
            max-width: 450px;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px #0000000b;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            height: 180px;
            background: #efe2d1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 65px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content {
            padding: 18px;
        }

        .category {
            display: inline-block;
            color: #7b4b2a;
            background: #f5eadc;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .artisan {
            font-size: 13px;
            color: #888;
            margin-bottom: 12px;
        }

        .description {
            font-size: 14px;
            line-height: 1.5;
            color: #666;
            min-height: 42px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 19px;
            color: #7b4b2a;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .detail-button {
            display: block;
            text-align: center;
            background: #7b4b2a;
            color: white;
            padding: 11px;
            border-radius: 7px;
            text-decoration: none;
        }

        .empty {
            background: white;
            padding: 25px;
            border-radius: 10px;
            color: #777;
        }

        footer {
            background: #39291f;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .hero h1 {
                font-size: 29px;
            }

            nav {
                padding: 18px 5%;
            }

            .container {
                padding: 35px 5%;
            }
        }
    </style>
</head>

<body>
    <nav>
    <div class="logo">RuangKarya.</div>
    <div>
        <a href="{{ route('crafts.index') }}">Beranda</a>
        <a href="#produk">Produk</a>
        <a href="{{ route('admin.crafts.index') }}">Kelola Produk</a>
    </div>
    </nav>
    <section class="hero">
        <h1>Karya Lokal, Cerita Istimewa.</h1>
        <p>
            Temukan berbagai kerajinan tangan unik buatan pengrajin lokal.
            Dari dekorasi rumah hingga aksesoris, setiap karya punya cerita.
        </p>
        <a href="#produk">Jelajahi Produk</a>
    </section>

    <main class="container" id="produk">
        <h2 class="section-title">Koleksi Kerajinan</h2>
        <p class="subtitle">
            Pilihan karya kreatif dari pengrajin lokal Indonesia.
        </p>

        <input
            type="text"
            id="searchInput"
            class="search"
            placeholder="Cari nama atau kategori produk..."
        >

        <div class="products" id="productList">
            @forelse ($crafts as $craft)
                <article class="card"
                    data-search="{{ strtolower($craft->name . ' ' . $craft->category . ' ' . $craft->artisan) }}">

                    <div class="product-image">
                        @if ($craft->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($craft->image))
                            <img
                                src="{{ asset('storage/' . $craft->image) }}"
                                alt="{{ $craft->name }}"
                            >
                        @elseif (str_contains(strtolower($craft->category), 'aksesoris'))
                            👜
                        @else
                            🏺
                        @endif
                    </div>

                    <div class="card-content">
                        <span class="category">{{ $craft->category }}</span>

                        <h3>{{ $craft->name }}</h3>

                        <p class="artisan">
                            Pengrajin: {{ $craft->artisan }}
                        </p>

                        <p class="description">
                            {{ $craft->description }}
                        </p>

                        <p class="price">
                            Rp {{ number_format($craft->price, 0, ',', '.') }}
                        </p>

                        <a
                            href="{{ route('crafts.show', $craft->id) }}"
                            class="detail-button"
                        >
                            Lihat Detail
                        </a>
                    </div>
                </article>
            @empty
                <p class="empty">Belum ada produk kerajinan yang tersedia.</p>
            @endforelse
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} RuangKarya. Mendukung pengrajin lokal Indonesia.</p>
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.card');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();

            cards.forEach(function (card) {
                const product = card.dataset.search;
                card.style.display = product.includes(keyword) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
