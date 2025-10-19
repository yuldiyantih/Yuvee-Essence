<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = [
            [
                'title' => 'Nude Bloom Eyeshadow Palette',
                'image' => 'images/palette.jpg',
                'rating' => 5.0,
            ],
            [
                'title' => 'Glossy Charm Lip Tint',
                'image' => 'images/liptint.jpg',
                'rating' => 5.0,
            ],
            [
                'title' => 'Flawless Matte Powder',
                'image' => 'images/powder.jpg',
                'rating' => 5.0,
            ],
        ];

        return view('dashboard', compact('products'));
    }
}
