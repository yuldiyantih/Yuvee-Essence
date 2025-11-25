<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Velvet Dream Eyeshadow',
                'price' => 59000,
                'image' => 'eyeshadow5.png',
                'description' => 'Palette warna natural untuk pemakaian sehari-hari.',
                'category_id' => 1,
                'stock' => 50
            ],
            [
                'name' => 'Velvet Rose Lipstick',
                'price' => 49000,
                'image' => 'lipstikmerah1remove.png',
                'description' => 'Lipstick lembut dengan hasil glossy.',
                'category_id' => 2,
                'stock' => 50
            ],
            [
                'name' => 'Flawless Matte Powder',
                'price' => 69000,
                'image' => 'powder2.png',
                'description' => 'Bedak tabur untuk hasil matte sempurna.',
                'category_id' => 3,
                'stock' => 50
            ],
            [
                'name' => 'Soft Glow Blush',
                'price' => 35000,
                'image' => 'blushon3.png',
                'description' => 'Blush on memberikan rona sehat.',
                'category_id' => 4,
                'stock' => 50
            ],
            [
                'name' => 'Flawless Skin Foundation',
                'price' => 55000,
                'image' => 'foundation2.png',
                'description' => 'Foundation ringan menutup sempurna.',
                'category_id' => 5,
                'stock' => 50
            ],
            [
                'name' => 'Feather Lash Mascara',
                'price' => 39000,
                'image' => 'mascara3.png',
                'description' => 'Bulu mata lentik maksimal, sentuhan ringan tanpa gumpal',
                'category_id' => 6,
                'stock' => 50
            ],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
