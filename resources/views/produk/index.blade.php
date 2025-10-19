@extends('layouts.app')

@section('content')
<!-- Panggil CSS khusus produk -->
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">

<section class="produk-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Enjoy shopping<br>with us!</h1>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/modelproduk1.png') }}" alt="Model Yuvee Essence">
        </div>
    </div>
</section>

<section class="produk-grid">
    {{-- Produk 1 --}}
    <div class="product-card">
        <img src="{{ asset('images/eyeshadow4.png') }}" alt="Nude Eyeshadow Palette">
        <h3>Nude Eyeshadow Palette</h3>
        <p>Rp. 59.000</p>
        <a href="{{ route('produk.show', ['id' => 1]) }}" class="view-btn">View More</a>
    </div>

    {{-- Produk 2 --}}
    <div class="product-card">
        <img src="{{ asset('images/lipstik2.png') }}" alt="Glossy Charm Lipstik">
        <h3>Glossy Charm Lipstik</h3>
        <p>Rp. 49.000</p>
        <a href="{{ route('produk.show', ['id' => 8]) }}" class="view-btn">View More</a>
    </div>

    {{-- Produk 3 --}}
    <div class="product-card">
        <img src="{{ asset('images/powder1.png') }}" alt="Flawless Matte Powder">
        <h3>Flawless Matte Powder</h3>
        <p>Rp. 69.000</p>
        <a href="{{ route('produk.show', ['id' => 9]) }}" class="view-btn">View More</a>
    </div>

    {{-- Produk 4 --}}
    <div class="product-card">
        <img src="{{ asset('images/blushon3.png') }}" alt="Soft Glow Blush">
        <h3>Soft Glow Blush</h3>
        <p>Rp. 35.000</p>
        <a href="{{ route('produk.show', ['id' => 10]) }}" class="view-btn">View More</a>
    </div>

    {{-- Produk 5 --}}
    <div class="product-card">
        <img src="{{ asset('images/foundation.png') }}" alt="Flawless Skin Foundation">
        <h3>Flawless Skin Foundation</h3>
        <p>Rp. 55.000</p>
        <a href="{{ route('produk.show', ['id' => 11]) }}" class="view-btn">View More</a>
    </div>

    {{-- Produk 6 --}}
    <div class="product-card">
        <img src="{{ asset('images/mascara3.png') }}" alt="Ultra Black Ink Mascara">
        <h3>Ultra Black Ink Mascara</h3>
        <p>Rp. 39.000</p>
        <a href="{{ route('produk.show', ['id' => 12]) }}" class="view-btn">View More</a>
    </div>
</section>
@endsection