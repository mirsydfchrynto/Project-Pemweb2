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
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('product_category_id')->nullable(); 
            $table->string('name', 255); 
            $table->text('description')->nullable(); 
            $table->decimal('price', 10, 2); 
            $table->unsignedInteger('stock')->default(0); 
            $table->string('image')->nullable(); 
            $table->timestamps(); 

            // Foreign key constraint
            $table->foreign('product_category_id')
                  ->references('id')->on('product_categories')
                  ->onDelete('set null'); // jika kategori dihapus, produk tetap ada tapi nilainya null
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