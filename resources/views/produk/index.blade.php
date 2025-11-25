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
            <img src="{{ asset('images/modelnew6.png') }}" alt="Model Yuvee Essence">
        </div>
    </div>
</section>

<section class="produk-grid">
    @foreach ($products as $product)
    <div class="product-card">
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p>Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
        <a href="{{ route('produk.show', $product->id) }}" class="view-btn">View More</a>
    </div>
    @endforeach
</section>

@endsection