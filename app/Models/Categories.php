<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

        // Relasi dengan produk
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }


}