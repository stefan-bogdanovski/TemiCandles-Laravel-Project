<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_notes');
    }
    public function available_products()
    {
        return $this->products()->where('products.deleted_at', null);
    }
}
