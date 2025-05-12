<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

        // Definisikan relasi belongsTo dengan Category
    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }

}