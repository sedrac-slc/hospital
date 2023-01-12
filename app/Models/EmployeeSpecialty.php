<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialtyEmployee extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'id',
        'employee_id',
        'specialty_id',
        'created_by',
        'updated_by'
    ];

}
