<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table="contracts" ;
    protected $guarded = [];
    
    public function property(){
        $property= $this->hasMany(Property::class,'id','property_id')->first();
        if($property == null)
            return null ;
        else
            return $property->name;
    }
    public function unit(){
        $unit= $this->hasMany(Unit::class,'id','unit_id')->first();
        if($unit == null)
            return null ;
        else
            return $unit->unit_number;
    }
    public function tenant(){
        $tenant= $this->hasMany(Tenant::class,'id','tenant_id')->first();
        if($tenant == null)
            return null ;
        else
        return $tenant->fname ;
    }
    
    public function documents()
    {
        return $this->hasMany(ContractDocuments::class, 'contract_id', 'id');
    }
    public function getContractDocuments(){
        return $this->hasMany(ContractDocuments::class,'contract_id','id')->select('name')->get();
    }
    public function ContractDocuments(){
        return $this->hasMany(ContractDocuments::class,'contract_id','id')->pluck('name');
    }
  
}
