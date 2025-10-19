<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // kolom id (primary key)
            $table->string('name'); // nama produk
            $table->string('slug')->unique(); // <--- Tambahkan baris ini
            $table->text('description')->nullable(); // deskripsi produk
            $table->decimal('price', 10, 2); // harga produk
            $table->integer('stock')->default(0); // stok produk
            $table->unsignedBigInteger('category_id'); // relasi ke tabel kategori
            $table->string('image')->nullable(); // gambar produk
            $table->timestamps(); // otomatis membuat created_at dan updated_at

            // Relasi ke tabel categories
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
