<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🛍️ Menampilkan semua produk di halaman produk utama
    public function index()
    {
        // Ambil semua produk urut dari yang terbaru
        $products = Product::orderBy('id', 'desc')->get();

        // Kirim ke view produk/index.blade.php
        return view('produk.index', compact('products'));
    }

    // 🔎 Menampilkan detail produk berdasarkan ID (untuk tombol View More)
    public function show($id)
    {
        // Cari produk berdasarkan ID, jika tidak ditemukan maka error 404
        $product = Product::findOrFail($id);

        // Kirim data produk ke view produk/show.blade.php
        return view('produk.show', compact('product'));
    }

    // 🏷️ Menampilkan produk berdasarkan kategori (nanti disambungkan ke tabel kategori)
    public function category($slug)
    {
        // Placeholder sementara
        return "Halaman kategori: $slug";
    }

    // 💳 Halaman checkout (opsional)
    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('produk.checkout', compact('product'));
    }
}
