@extends('layouts.app')

@section('title', 'RuangKarya | Marketplace Kerajinan')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #39291f;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('crafts.index') }}">
            RuangKarya
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarRuangKarya" aria-controls="navbarRuangKarya"
            aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarRuangKarya">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('crafts.index') }}">Beranda</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection

@section('content')
<header class="py-5" style="background-color: #f5ede2;">
    <div class="container py-3">
        <p class="text-uppercase fw-semibold mb-2" style="color: #8a5a3b;">
            Karya Lokal, Cerita Istimewa
        </p>
        <h1 class="display-5 fw-bold" style="color: #39291f;">
            Temukan Kerajinan Unik di RuangKarya
        </h1>
        <p class="lead mb-0">
            Pilihan kerajinan buatan tangan dari pengrajin lokal Indonesia.
        </p>
    </div>
</header>

<section class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Koleksi Kerajinan</h2>
            <p class="text-secondary mb-0">Temukan karya yang cocok untukmu.</p>
        </div>
        <span class="badge rounded-pill mt-2" style="background-color: #39291f;">
            {{ $crafts->count() }} Produk
        </span>
    </div>

    <div class="row g-4">
        @forelse ($crafts as $craft)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($craft->image && file_exists(public_path('assets/images/' . $craft->image)))
                        <img
                            src="{{ asset('assets/images/' . $craft->image) }}"
                            class="card-img-top"
                            alt="{{ $craft->name }}"
                            style="height: 240px; object-fit: cover;"
                        >
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="height: 240px;">
                            <span class="text-secondary">Foto belum tersedia</span>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <p class="small text-secondary mb-2">
                            Pengrajin: {{ $craft->artisan }}
                        </p>
                        <h5 class="card-title fw-bold">{{ $craft->name }}</h5>
                        <p class="text-secondary mb-2">
                            Bahan: {{ $craft->material }}
                        </p>
                        <p class="fw-bold fs-5 mb-3" style="color: #8a5a3b;">
                            Rp {{ number_format($craft->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('crafts.show', $craft->id) }}"
                            class="btn mt-auto text-white"
                            style="background-color: #39291f;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada produk kerajinan yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</section>
@endsection

@section('footer')
<footer class="py-4 text-center text-white" style="background-color: #39291f;">
    <div class="container">
        <p class="mb-1 fw-bold">RuangKarya</p>
        <p class="mb-0 small">Marketplace Kerajinan Lokal Indonesia</p>
    </div>
</footer>
@endsection
