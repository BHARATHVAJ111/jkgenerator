<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_type',
        'company_name',
        'contact_number',
        'pan_card_number',
        'pan_card',
        'business_card',
        'memo',
        'remarks',
    ];
}
