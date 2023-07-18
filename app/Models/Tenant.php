<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = "tenants";
    protected $guarded = [];
    public function country($id)
    {
        $country = Country::where('id', $id)->first();
        if ($country != null)
            return $country;
        else return null;
    }
    public function getTenantDocuments()
    {
        return $this->hasMany(TenantDocument::class, 'tenant_id', 'id')->get();
    }
    public function getTenantGuests()
    {
        return $this->hasMany(TenantGuest::class, 'tenant_id', 'id')->get();
    }
    public function getTenantPets()
    {
        return $this->hasMany(TenantPet::class, 'tenant_id', 'id')->get();
    }
    public function getTenantVehicles()
    {
        return $this->hasMany(TenantVehicle::class, 'tenant_id', 'id')->get();
    }
}
