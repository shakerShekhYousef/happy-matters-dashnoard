<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitUtility extends Model
{
    use HasFactory;
    protected $table='unit_utility';
    protected $fillable=['units_id','utilities_id'];
}
