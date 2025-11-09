<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shopping_cart_items', function(Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_cart_id')->constrained('shopping_cart')->onDeleteCascade();
            $table->integer('number_of_items')->default(0);
            $table->string('sku');
            $table->string('variant_id');
            $table->string('variant_name');
            $table->string('product_id');
            $table->string('product_name');
            $table->decimal('price', 8, 2);
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_items');
    }
};
