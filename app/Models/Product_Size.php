<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    use HasFactory;
    protected $table = 'products_sizes';
    protected $fillable = ["product_id", "size_id", "price", "created_at", "updated_at"];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function basket()
    {
        return $this->hasMany(User_Basket::class, 'product_size_id', 'id');
    }
}
