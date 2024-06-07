<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageLead extends Model
{
    use HasFactory;

    protected  $table='manage_leads';

    protected $guarded=[];
}
