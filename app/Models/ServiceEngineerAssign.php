<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEngineerAssign extends Model
{
    use HasFactory;

    protected $table='service_engineer_assigns';

    protected $guarded=[];

    public function visitOne()
    {
        return $this->hasOne(VisitOne::class, 'asset_number', 'asset_number')
            ->where('engineer_id', 1)
            ->whereNotNull('last_os_service');
    }

    public function visitTwo()
    {
        return $this->hasOne(VisitTwo::class, 'asset_number', 'asset_number')
            ->where('engineer_id', 1)
            ->whereNotNull('last_os_service');
    }

    public function visitThree()
    {
        return $this->hasOne(VisitThree::class, 'asset_number', 'asset_number')
            ->where('engineer_id', 1)
            ->whereNotNull('last_os_service');
    }

    public function visitFour()
    {
        return $this->hasOne(VisitFour::class, 'asset_number', 'asset_number')
            ->where('engineer_id', 1)
            ->whereNotNull('last_os_service');
    }

}
