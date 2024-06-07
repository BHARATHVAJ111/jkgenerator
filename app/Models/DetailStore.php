<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailStore extends Model
{
    use HasFactory;

    protected $table='detail_stores';
    protected $guarded=[];
}
