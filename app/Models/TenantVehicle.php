<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantVehicle extends Model
{
    use HasFactory;
    protected $table = "tenant_vehicles" ;
    protected $guarded = [];
}
