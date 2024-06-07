<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHistory extends Model
{
    use HasFactory;

    protected $table='master_histories';

    protected $guarded=[];
}
