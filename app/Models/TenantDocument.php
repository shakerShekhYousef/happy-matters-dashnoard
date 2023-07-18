<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantDocument extends Model
{
    use HasFactory;
    protected $table = "tenant_documents" ;
    protected $guarded = [];
}
