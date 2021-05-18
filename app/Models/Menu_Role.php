<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Role extends Model
{
    use HasFactory;
    protected $table = 'menus_roles';
    protected $fillable = ['menu_id', 'role_id'];
}
