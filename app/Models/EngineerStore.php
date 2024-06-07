<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineerStore extends Model
{
    use HasFactory;
    protected $table = 'engineer_stores';
    protected $fillable = ['name', 'email', 'password', 'phone'];
}
