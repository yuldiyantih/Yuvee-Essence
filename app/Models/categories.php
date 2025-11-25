<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // nama tabel

    protected $fillable = ['name', 'slug']; // sesuaikan field kamu

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
