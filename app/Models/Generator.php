<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    use HasFactory;
    protected $guarded=[];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastRecord = static::latest()->first();
            if ($lastRecord) {
                // Extract the numeric part of the last jrnum value and increment it
                preg_match('/(\d+)$/', $lastRecord->asset_number, $matches);
                $nextNumber = isset($matches[1]) ? $matches[1] + 1 : 1;


                $model->asset_number = 'JKGPL' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            } else {
                // If no record exists, start from 1
                $model->asset_number = 'JKGPL001';
            }
        });
    }

}
