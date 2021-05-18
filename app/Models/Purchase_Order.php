<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    use HasFactory;
    protected $table = 'purchase_order';
    protected $fillable = ['payment_id', 'date', 'phone','township', 'city', 'address', 'total', 'delivery'];

    public function products()
    {
        return $this->hasMany(User_Basket::class, 'purchase_order_id', 'id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
}
