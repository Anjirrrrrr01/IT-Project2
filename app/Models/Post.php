<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'stok', 'category_id', 'image']; // Tambahkan 'image'

    /**
     * Relasi ke Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
