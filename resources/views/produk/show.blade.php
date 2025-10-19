@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">

<section class="product-detail">
    <div class="container">
        {{-- Gambar produk --}}
        <div class="image-section">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        {{-- Informasi produk --}}
        <div class="info-section">
            <h2>{{ $product->name }}</h2>
            <p class="price">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="netto">Netto: <span>{{ $product->netto ?? '14 gram' }}</span></p>

            {{-- Form tambah ke keranjang --}}
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <label>Jumlah:</label>
                <div class="qty">
                    <button type="button" class="minus">-</button>
                    <input type="number" name="quantity" value="1" min="1" class="input-qty">
                    <button type="button" class="plus">+</button>
                </div>

                <div class="btn-group">
                    <button type="submit" formaction="{{ route('cart.buy', $product->id) }}" class="btn-buy">
                        Beli Langsung
                    </button>
                    <button type="submit" class="btn-cart">
                        + Tambahkan ke Keranjang
                    </button>
                </div>
            </form>

            {{-- Deskripsi produk --}}
            <div class="desc">
                <h3>Product Details</h3>
                <p>{{ $product->description }}</p>

                <h3>Ingredients</h3>
                <p>{{ $product->ingredients ?? 'Mica, Talc, Silica, Dimethicone, Titanium Dioxide, Iron Oxides, Fragrance.' }}</p>

                <h3>Skin Type</h3>
                <p>{{ $product->skin_type ?? 'Cocok untuk semua jenis kulit.' }}</p>

                <h3>How to Use</h3>
                <p>{{ $product->how_to_use ?? 'Aplikasikan warna dasar di seluruh kelopak mata, tambahkan warna gelap di sudut mata, dan shimmer di tengah untuk hasil lebih hidup.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ✅ Script agar tombol + dan - berfungsi --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.querySelector('.minus');
        const plusBtn = document.querySelector('.plus');
        const qtyInput = document.querySelector('.input-qty');

        minusBtn.addEventListener('click', function() {
            let value = parseInt(qtyInput.value);
            if (value > 1) {
                qtyInput.value = value - 1;
            }
        });

        plusBtn.addEventListener('click', function() {
            let value = parseInt(qtyInput.value);
            qtyInput.value = value + 1;
        });
    });
</script>
@endsection