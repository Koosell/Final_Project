<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
    ];

    /**
     * Mendefinisikan relasi ke OrderItem.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Mendefinisikan relasi polimorfik ke model CartItem.
     * Artinya, sebuah produk (game) bisa memiliki banyak item keranjang.
     * INI ADALAH FUNGSI YANG BARU DITAMBAHKAN.
     */
    public function cartItems()
    {
        return $this->morphMany(CartItem::class, 'itemable');
    }
}
