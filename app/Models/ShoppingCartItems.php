<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartItems extends Model
{
    protected $fillable = [
        'shopping_cart_id',
        'number_of_items',
        'sku',
        'variant_id',
        'variant_name',
        'product_id',
        'product_name',
        'price',
        'total_price'
    ];

    protected $casts = [
        'number_of_items' => 'integer',
        'total_price' => 'integer',
    ];

    public function cart() {
        return $this->belongsTo(ShoppingCart::class);
    }
}
