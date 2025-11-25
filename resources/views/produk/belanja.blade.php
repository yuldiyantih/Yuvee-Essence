@extends('layouts.app')

@section('title', 'Beli Sekarang | Yuvee Essence')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Ringkasan Pembelian</h2>
        <p class="text-muted">Periksa kembali detail produk sebelum melanjutkan ke pembayaran</p>
    </div>

    @if(!empty($items))
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    @foreach ($items as $item)
                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                        <img src="{{ asset('storage/' . $item['image']) }}"
                            alt="{{ $item['name'] }}"
                            class="rounded-3 me-4"
                            style="width: 100px; height: 100px; object-fit: cover;">

                        <div class="flex-grow-1">
                            <h5 class="mb-1">{{ $item['name'] }}</h5>
                            <p class="text-muted mb-1">Harga: Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                            <p class="text-muted mb-0">Jumlah: {{ $item['quantity'] }}</p>
                        </div>

                        <div class="text-end">
                            <h5 class="fw-bold text-primary">
                                Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </h5>
                        </div>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h5 class="mb-0 fw-bold">Total:</h5>
                        <h4 class="fw-bold text-success">Rp{{ number_format($total, 0, ',', '.') }}</h4>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary rounded-pill px-4 me-2">
                            Kembali ke Keranjang
                        </a>

                        {{-- Tombol lanjut ke checkout --}}
                        @php
                        $firstItem = $items[0] ?? null;
                        @endphp
                        @if ($firstItem)
                        <a href="{{ route('produk.checkout', $firstItem['id']) }}"
                            class="btn btn-primary rounded-pill px-5">
                            Lanjut ke Pembayaran
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <h5 class="text-muted">Tidak ada produk yang dibeli.</h5>
        <a href="{{ route('produk.index') }}" class="btn btn-primary rounded-pill mt-3">
            Belanja Sekarang
        </a>
    </div>
    @endif
</div>
@endsection