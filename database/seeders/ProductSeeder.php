<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Nude Eyeshadow Palette', 'price' => 59000, 'image' => 'nude-eyeshadow.jpg', 'description' => 'Palette warna natural untuk pemakaian sehari-hari.'],
            ['name' => 'Glossy Charm Lip Tint', 'price' => 49000, 'image' => 'glossy-charm.jpg', 'description' => 'Lip tint lembut dengan hasil glossy.'],
            ['name' => 'Flawless Matte Powder', 'price' => 69000, 'image' => 'flawless-matte.jpg', 'description' => 'Bedak tabur untuk hasil matte sempurna.'],
            ['name' => 'Soft Glow Blush', 'price' => 35000, 'image' => 'soft-glow-blush.jpg', 'description' => 'Blush on memberikan rona sehat.'],
            ['name' => 'Flawless Skin Foundation', 'price' => 55000, 'image' => 'flawless-skin.jpg', 'description' => 'Foundation ringan menutup sempurna.'],
            ['name' => 'Ultra Black Ink Liner', 'price' => 39000, 'image' => 'ultra-black-liner.jpg', 'description' => 'Eyeliner tahan lama, garis rapi.'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
