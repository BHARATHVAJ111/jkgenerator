<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Indent extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'customer_name',
        'company_name',
        'number_1',
        'number_2',
        'source_of_lead',
        'pickup_location_id',
        'drop_location_id',
        'material_type_id',
        'truck_type_id',
        'body_type',
        'weight',
        'weight_unit',
        'pod_soft_hard_copy',
        'remarks',
    ];
    
    public function indentRate()
    {
        return $this->hasMany(Rate::class, 'indent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


// Inside Indent.php model
public function pickupLocation()
{
    return $this->belongsTo(Location::class, 'pickup_location_id');
}

public function dropLocation()
{
    return $this->belongsTo(Location::class, 'drop_location_id');
}

public function materialType()
{
    return $this->belongsTo(MaterialType::class, 'material_type_id');
}

public function truckType()
{
    return $this->belongsTo(TruckType::class, 'truck_type_id');
}

public function getUniqueENQNumber()
{
    $id = $this->id;
    $prefix = 'XXX';
    $suffix = str_pad($id, 2, '0', STR_PAD_LEFT); // Padding with zeros if the ID is less than 10

    return $prefix . $suffix;
}

// Inside Indent model
public function cancelReasons()
{
    return $this->belongsToMany(CancelReason::class, 'indent_cancel_reason');
}


}
