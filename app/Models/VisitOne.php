<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitOne extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function oilService()
    {
        return $this->hasOne(ServiceEngineerAssign::class, 'asset_number', 'asset_number');
    }
}
