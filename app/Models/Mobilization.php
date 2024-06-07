<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobilization extends Model
{
    use HasFactory;
    protected $table='mobilizations';
    protected $fillable = [
        'client_name',
        'location',
        'open_hr',
        'open_date',
        'last_os_hr',
        'last_os_date',
        'movement',
        'closing_hr',
        'closing_date',
        'asset_number',
    ];
}
