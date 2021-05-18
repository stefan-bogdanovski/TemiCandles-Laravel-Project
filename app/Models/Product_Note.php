<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Note extends Model
{
    use HasFactory;
    protected $table = 'products_notes';
    protected $fillable = ["product_id", "note_id", "created_at", "updated_at"];
}
