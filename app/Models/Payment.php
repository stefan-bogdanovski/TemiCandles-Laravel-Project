<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    public function purchase_order()
    {
        return $this->hasMany(Purchase_Order::class, 'payment_id', 'id');
    }
}
