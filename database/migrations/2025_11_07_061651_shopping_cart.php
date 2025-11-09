<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shopping_cart', function(Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('street_address');
            $table->string('city');
            $table->string('state_province');
            $table->string('postal');
            $table->string('order_number');
            $table->integer('total_items')->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shopping_cart');
    }
};
