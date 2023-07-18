<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    use HasFactory;
    protected $table = "properties";

    protected $guarded = [];

    public function getCountryName()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id')->where('id', $this->country_id)->get('countries.name')[0]['name'];
    }

    public function getLandlordName()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id', 'id')->where('id', $this->landlord_id)->first()->getFullName();
    }

    public function Amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenity', 'properties_id', 'amenities_id', 'id', 'id');
    }

    public function getAmenitiesList()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenity', 'properties_id', 'amenities_id', 'id', 'id')->get(['amenities.name']);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
