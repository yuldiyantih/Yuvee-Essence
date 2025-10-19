<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 🛒 Tampilkan isi keranjang
    public function index()
    {
        $sessionCart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        foreach ($sessionCart as $productId => $item) {
            $product = Product::find($productId);

            $price = $product->price ?? ($item['price'] ?? 0);
            $image = $product->image ?? ($item['image'] ?? 'default.png');
            $name = $product->name ?? ($item['name'] ?? 'Produk');

            $quantity = $item['quantity'] ?? 1;
            $lineTotal = $price * $quantity;
            $total += $lineTotal;

            $cartItems[] = (object) [
                'id' => $productId,
                'product' => $product,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => $quantity,
                'lineTotal' => $lineTotal,
            ];
        }

        return view('cart.cart', compact('cartItems', 'total'));
    }

    // ➕ Tambah produk ke keranjang
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $qty = (int) $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image ?? 'default.png',
                'quantity' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // 🔁 Update jumlah item
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $qty = (int) $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $qty);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    // ❌ Hapus item dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}
