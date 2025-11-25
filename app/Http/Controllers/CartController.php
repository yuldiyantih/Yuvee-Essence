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

    // 💳 Beli Sekarang (langsung checkout 1 produk)
    public function buy($id)
    {
        $product = Product::findOrFail($id);

        // Simpan produk sementara untuk checkout langsung
        session()->put('buy_now', [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image ?? 'default.png',
        ]);

        return redirect()->route('cart.checkout');
    }

    // 🧾 Halaman checkout gabungan (keranjang & beli langsung)
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $buyNow = session()->get('buy_now');

        if ($buyNow) {
            $items = [$buyNow];
            $total = $buyNow['price'];
        } else {
            $items = $cart;
            $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        }

        return view('produk.belanja', compact('items', 'total'));
    }
}
