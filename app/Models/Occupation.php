<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'position',
        'description',
        'created_by',
        'updated_by'
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

}
