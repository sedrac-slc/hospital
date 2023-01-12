<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationType extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'created_by',
        'updated_by'
    ];

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

}
