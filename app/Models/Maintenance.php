<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = "maintenances";
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

    public function documents()
    {
        return $this->hasMany(MaintenanceDocuments::class, 'Maintenance_id', 'id');
    }

    public function medias()
    {
        return $this->hasMany(MaintenanceMedia::class, 'Maintenance_id', 'id');
    }

    public function getMaintenanceDocuments()
    {
        return $this->hasMany(MaintenanceDocuments::class, 'Maintenance_id', 'id')->get();
    }
    public function MaintenanceDocuments()
    {
        return $this->hasMany(MaintenanceDocuments::class, 'Maintenance_id', 'id')->pluck('name');
    }
    public function getMaintenanceMedia()
    {
        return $this->hasMany(MaintenanceMedia::class, 'Maintenance_id', 'id')->get();
    }
}
