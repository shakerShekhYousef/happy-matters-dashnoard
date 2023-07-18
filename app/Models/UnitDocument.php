<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDocument extends Model
{
    use HasFactory;

    protected $table = "unit_documents";
    protected $guarded = [];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
