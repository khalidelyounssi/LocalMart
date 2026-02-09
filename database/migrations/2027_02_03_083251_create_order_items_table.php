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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // الربط مع الطلب الرئيسي
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            
            // الربط مع المنتج
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            // الربط مع البائع (ضروري باش كل بائع يشوف سلعتو بوحدها)
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');

            $table->integer('quantity');
            $table->decimal('price_at_purchase', 10, 2); // الثمن وقت الشراء

            // حالة المنتج (كل بائع كيغير حالة السلعة ديالو بوحدو)
            $table->enum('status', ['pending', 'shipped', 'delivered'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};