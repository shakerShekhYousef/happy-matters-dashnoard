<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = "vendors";
    protected $guarded = [];



    
    public function getCountryName()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id')->where('id', $this->country_id)->get('countries.name')[0]['name'];
    }
}

