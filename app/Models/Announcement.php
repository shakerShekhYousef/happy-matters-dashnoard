<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = "announcements";
    protected $guarded = [];
    public function property()
    {
        $property = $this->hasMany(Property::class, 'id', 'property_id')->first();
        if ($property == null)
            return null;
        else
            return $property->name;
    }
    public function unit()
    {
        $unit = $this->hasMany(Unit::class, 'id', 'unit_id')->first();
        if ($unit == null)
            return null;
        else
            return $unit->unit_number;
    }
}
