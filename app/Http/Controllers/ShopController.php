<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $produk = [
            ['nama' => 'Powder', 'deskripsi' => 'Memberikan hasil akhir matte dan lembut.', 'gambar' => 'powder.jpg'],
            ['nama' => 'Blush On', 'deskripsi' => 'Buat pipimu tampak merona alami.', 'gambar' => 'blushon.jpg'],
            ['nama' => 'Mascara', 'deskripsi' => 'Bulu mata lentik dan tebal seketika.', 'gambar' => 'mascara.jpg'],
            ['nama' => 'Eyeshadow', 'deskripsi' => 'Warna intens untuk tampilan memukau.', 'gambar' => 'eyeshadow.jpg'],
            ['nama' => 'Foundation', 'deskripsi' => 'Ratakan warna kulit dengan sempurna.', 'gambar' => 'foundation.jpg'],
        ];

        // arahkan ke view dalam folder "produk"
        return view('produk.belanja', compact('produk'));
    }
}
