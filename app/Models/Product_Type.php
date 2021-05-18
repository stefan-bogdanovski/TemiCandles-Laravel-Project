<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    use HasFactory;
    protected $table = "products_types";
    protected $fillable = ["product_id", "type_id", "created_at", "updated_at"];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
