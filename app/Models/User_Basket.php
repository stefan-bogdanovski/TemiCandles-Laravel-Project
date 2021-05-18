<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Basket extends Model
{
    use HasFactory;
    protected $table = 'users_basket';
    protected $fillable = ['product_size_id', 'quantity', 'user_id', 'purchase_order_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product_Size::class, 'product_size_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Purchase_Order::class, 'purchase_order_id', 'id');
    }
}
