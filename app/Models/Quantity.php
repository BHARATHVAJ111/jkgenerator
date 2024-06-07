<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;
protected $table='quantities';
    protected $fillable=['jrnum',
    'material_type',
    'number_of_quantity',
    'add_quantity',
    'total_quantity'];
}
