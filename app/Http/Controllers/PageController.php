<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // akses tabel produk

class PageController extends Controller
{
    /**
     * Halaman utama (Home)
     */
    public function home()
    {
        // Ambil 3 produk bestseller dari database
        // Pastikan tabel 'products' punya kolom image, name, price, dst.
        $products = Product::take(3)->get();

        return view('home', [
            'judul' => 'Home | Yuvee Essence',
            'products' => $products, // kirim data ke view
        ]);
    }

    /**
     * Halaman Tentang Kami
     */
    public function tentang()
    {
        return view('tentang', [
            'judul' => 'Tentang Kami | Yuvee Essence'
        ]);
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('kontak', [
            'judul' => 'Kontak | Yuvee Essence'
        ]);
    }

    /**
     * Halaman About Us
     */
    public function aboutus()
    {
        return view('aboutus', [
            'judul' => 'About Us | Yuvee Essence'
        ]);
    }

    /**
     * Halaman Kebijakan Privasi
     */
    public function kebijakanPrivasi()
    {
        return view('kebijakan');
    }

    /**
     * Halaman Syarat & Ketentuan
     */
    public function syaratKetentuan()
    {
        return view('syarat');
    }
}
