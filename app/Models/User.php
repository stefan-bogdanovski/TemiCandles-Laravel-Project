<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name','lastname','email', 'password', 'logged_in'];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function products_in_basket()
    {
        return $this->hasMany(User_Basket::class, 'user_id', 'id');
    }
}
