<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'name',
        'created_by',
        'updated_by'
    ];

    public function employees(){

        return $this->belongsToMany(Employee::class);
    }

}
