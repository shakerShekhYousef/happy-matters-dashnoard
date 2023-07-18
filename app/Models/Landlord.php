<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;
    protected $table = "landlords";
    protected $guarded = [];


   

    public function contract()
    {
        return $this->belongsTo(contract::class);
    }

    public function getFullName()
    {
        return $this->fname . ' ' . $this->lname;
    }
  
    public function documents()
    {
        return $this->hasMany(LandlordDocuments::class, 'landlord_id', 'id');
    }
    public function getLandlordDocuments(){
        return $this->hasMany(LandlordDocuments::class,'landlord_id','id')->select('name')->get();
    }
    public function LandlordDocuments(){
        return $this->hasMany(LandlordDocuments::class,'landlord_id','id')->pluck('name');
    }
   
    
   
   
}
