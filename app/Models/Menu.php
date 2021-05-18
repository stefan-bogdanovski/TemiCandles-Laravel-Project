<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['route', 'name', 'order', 'menu_type_id'];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menus_roles');
    }
    public function type()
    {
        return $this->belongsTo(Menu_Type::class, 'menu_type_id', 'id');
    }

}
