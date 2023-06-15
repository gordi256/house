<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuildingInfo extends Model
{
    use HasFactory;
 
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function item()
    {
        return $this->hasMany(InfoItem::class,'id' ,'info_item_id' )->orderBy('id');
    }

 

}
