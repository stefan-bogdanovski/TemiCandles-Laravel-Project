<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Role extends Model
{
    use HasFactory;
    protected $table = 'users_roles';
    protected $fillable = ['user_id', 'role_id'];
}
