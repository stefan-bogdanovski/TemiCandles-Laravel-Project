<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Type extends Model
{
    use HasFactory;
    protected $table = 'menu_types';

    public function links()
    {
        return $this->hasMany(Menu::class, 'menu_type_id', 'id');
    }
}
