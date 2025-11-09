<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'street_address',
        'city',
        'state_province',
        'postal',
        'order_number',
        'total_items',
        'total'
    ];

    protected $casts = [
        'total_items' => 'integer',
        'total' => 'integer',
    ];

    public function items() {
        return $this->hasMany(ShoppingCartItems::class);
    }
}
