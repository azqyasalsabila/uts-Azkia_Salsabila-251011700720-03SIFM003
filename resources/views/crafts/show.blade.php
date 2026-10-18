@extends('layouts.app')

@section('title', $craft->name . ' | RuangKarya')

@push('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        background: #faf8f3;
        color: #333;
    }

    .detail-container {
        max-width: 950px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 35px;
        background: white;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 4px 20px #0000000b;
    }

    .product-image-box {
        min-height: 320px;
        background: #efe2d1;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 100px;
        overflow: hidden;
    }

    .product-image-box img {
        width: 100%;
        height: 320px;
        object-fit: cover;
    }

    .category {
        display: inline-block;
        background: #f5eadc;
        color: #7b4b2a;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 13px;
        margin-bottom: 18px;
    }

    .detail h1 {
        color: #59391f;
        margin-bottom: 15px;
        font-size: 30px;
    }

    .artisan {
        color: #777;
        margin-bottom: 20px;
    }

    .description {
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .info {
        margin-bottom: 12px;
    }

    .price {
        color: #7b4b2a;
        font-size: 27px;
        font-weight: bold;
        margin: 25px 0;
    }

    .back {
        display: inline-block;
        background: #7b4b2a;
        color: white;
        text-decoration: none;
        padding: 13px 20px;
        border-radius: 7px;
    }

    .detail-footer {
        background: #39291f;
        color: white;
        text-align: center;
        padding: 25px;
        margin-top: 50px;
    }

    @media (max-width: 650px) {
        .detail {
            grid-template-columns: 1fr;
            padding: 20px;
        }

        .detail h1 {
            font-size: 25px;
        }
    }
</style>
@endpush

@section('navbar')
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('crafts.index') }}">
            ← RuangKarya
        </a>
        <a class="nav-link" href="{{ route('admin.crafts.index') }}">
            Kelola Produk
        </a>
    </div>
</nav>
@endsection

@section('content')
<div class="detail-container">
    <div class="detail">
        <div class="product-image-box">
            @if ($craft->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($craft->image))
                <img
                    src="{{ asset('storage/' . $craft->image) }}"
                    alt="{{ $craft->name }}"
                >
            @elseif ($craft->image && file_exists(public_path('assets/images/' . $craft->image)))
                <img
                    src="{{ asset('assets/images/' . $craft->image) }}"
                    alt="{{ $craft->name }}"
                >
            @elseif (str_contains(strtolower($craft->category), 'aksesoris'))
                👜
            @else
                🏺
            @endif
        </div>

        <div>
            <span class="category">{{ $craft->category }}</span>

            <h1>{{ $craft->name }}</h1>

            <p class="artisan">Dibuat oleh {{ $craft->artisan }}</p>

            <p class="description">{{ $craft->description }}</p>

            <p class="info">
                <strong>Bahan:</strong> {{ $craft->material }}
            </p>

            <p class="info">
                <strong>Kategori:</strong> {{ $craft->category }}
            </p>

            <p class="price">
                Rp {{ number_format($craft->price, 0, ',', '.') }}
            </p>

            <a href="{{ route('crafts.index') }}" class="back">
                Kembali ke Produk
            </a>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="detail-footer">
    <p class="mb-0">
        &copy; {{ date('Y') }} RuangKarya. Mendukung pengrajin lokal Indonesia.
    </p>
</footer>
@endsection
