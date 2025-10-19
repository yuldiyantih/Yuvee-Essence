<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController; // 🛒 tambahkan controller keranjang

// ============= halaman umum =============
// Halaman utama home
Route::get('/', [PageController::class, 'home'])->name('home');

// Halaman tentang
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');

// Halaman kontak
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// Halaman about us
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

// Halaman kebijakan-privasi
Route::get('/kebijakan-privasi', [PageController::class, 'kebijakanPrivasi'])->name('kebijakan');

// Halaman syarat-ketentuan
Route::get('/syarat-ketentuan', [PageController::class, 'syaratKetentuan'])->name('syarat');

// ============= halaman produk =============
// Halaman daftar produk
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

// Halaman detail produk
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');

// Halaman kategori produk
Route::get('/kategori/{slug}', [ProductController::class, 'category'])->name('produk.category');

// Halaman checkout produk
Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('produk.checkout');


// ============= fitur keranjang (cart) =============
// Tambahkan produk ke keranjang
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Tombol "Beli Langsung" → langsung ke checkout
Route::post('/cart/buy/{id}', [CartController::class, 'buy'])->name('cart.buy');

// Halaman utama keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Update jumlah produk di keranjang
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Hapus item dari keranjang
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
