<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('produk.index', compact('products'));
    }

    // 🔎 Detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('produk.show', compact('product'));
    }

    // 📂 Produk berdasarkan kategori (PAKAI ID, BUKAN SLUG)
    public function category($id)
    {
        // Cari kategori berdasarkan id
        $category = Category::findOrFail($id);

        // Ambil produk berdasarkan category_id
        $products = Product::where('category_id', $category->id)->get();

        return view('produk.category', compact('category', 'products'));
    }

    // 💳 Checkout
    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('produk.checkout', compact('product'));
    }
}
