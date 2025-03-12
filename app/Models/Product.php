<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_category_id', 'description', 'price'];

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id'); 
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
