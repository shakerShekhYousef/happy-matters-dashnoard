<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table='units';

    public function getUnitDocuments(){
        return $this->hasMany(UnitDocument::class,'unit_id','id')->select('name')->get();
    }
    public function unitDocuments(){
        return $this->hasMany(UnitDocument::class,'unit_id','id')->pluck('name');
    }
    ///////
    public function unitFeatures(){
        return $this->belongsToMany(Feature::class,'unit_feature','units_id','features_id','id','id');
    }
    public function getUnitFeatures(){
        return $this->belongsToMany(Feature::class,'unit_feature','units_id','features_id','id','id')->select('features.name', 'features.id')->get();
    }
    //////
    public function getUnitLists(){
        return $this->hasMany(UnitList::class,'unit_id','id')->select('name')->get();
    }
    public function unitLists(){
        return $this->hasMany(UnitList::class,'unit_id','id')->pluck('name');
    }
    ////////

    public function unitUtilities(){
        return $this->belongsToMany(Utility::class,'unit_utility','units_id','utilities_id','id','id');
    }
    public function getUnitUtilities(){
        return $this->belongsToMany(Utility::class,'unit_utility','units_id','utilities_id','id','id')->select('utilities.id','utilities.name')->get();
    }
    //////
    public function property(){
        $property= $this->belongsTo(Property::class,'id','property_id')->first();
        if($property == null)
            return null ;
        else
            return $property->name;
    }
    ///
    // public function Amenities()
    // {
    //     return $this->belongsToMany(Amenity::class, 'property_amenity', 'properties_id', 'amenities_id', 'id', 'id');
    // }
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(UnitDocument::class, 'unit_id', 'id');
    }

    public function unitImages()
    {
        return $this->hasMany(UnitList::class, 'unit_id', 'id');
    }

}
