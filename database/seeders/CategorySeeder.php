<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Lipstik',
                'slug' => 'lipstik',
                'description' => 'Kategori untuk produk lipstik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Eyeshadow',
                'slug' => 'eyeshadow',
                'description' => 'Kategori untuk produk eyeshadow',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Foundation',
                'slug' => 'foundation',
                'description' => 'Kategori untuk produk foundation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mascara',
                'slug' => 'mascara',
                'description' => 'Kategori untuk produk mascara',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Blush-On',
                'slug' => 'blush-on',
                'description' => 'Kategori untuk produk blush-on',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Powder',
                'slug' => 'powder',
                'description' => 'Kategori untuk produk powder',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
