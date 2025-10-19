@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}"> {{-- file css khusus cart --}}

<section class="cart-page">
    <div class="cart-container">
        <h2>Keranjang Belanja Kamu</h2>

        @php
        // fallback: jika controller tidak menyediakan $cartItems, ambil dari session
        if (!isset($cartItems)) {
        $sessionCart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;
        foreach ($sessionCart as $pid => $it) {
        $price = $it['price'] ?? 0;
        $qty = $it['quantity'] ?? 1;
        $total += $price * $qty;
        $cartItems[] = (object) [
        'id' => $pid,
        'product' => null,
        'name' => $it['name'] ?? 'Produk',
        'price' => $price,
        'image' => $it['image'] ?? null,
        'quantity' => $qty,
        'lineTotal' => $price * $qty,
        ];
        }
        }
        @endphp

        @if (count($cartItems) > 0)
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td>
                        @if($item->image)
                        <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                        @else
                        <img src="{{ asset('images/default.png') }}" alt="placeholder">
                        @endif
                    </td>
                    <td>{{ $item->product ? $item->product->name : $item->name }}</td>
                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="quantity-control">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                            <button type="submit" class="btn-update">Update</button>
                        </form>
                    </td>
                    <td>Rp{{ number_format($item->lineTotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-update">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-total">
            <h3>Total Keseluruhan: <span>Rp{{ number_format($total, 0, ',', '.') }}</span></h3>
        </div>

        <div class="cart-buttons">
            <a href="{{ route('produk.index') }}" class="btn lanjut">
                <span style="font-size:16px; margin-right:8px;">◀</span> Lanjut Belanja
            </a>

            <a href="{{ route('produk.checkout', ['id' => collect($cartItems)->first()->id ?? 0]) }}" class="btn checkout">
                Checkout Sekarang <span style="font-size:16px; margin-left:8px;">▶</span>
            </a>
        </div>
        @else
        <p class="empty-cart">Keranjang kamu masih kosong 😢</p>
        <a href="{{ route('produk.index') }}" class="btn lanjut">
            ◀ Belanja Sekarang
        </a>
        @endif
    </div>
</section>
@endsection