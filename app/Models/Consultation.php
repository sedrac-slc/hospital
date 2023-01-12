<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'patient_id',
        'employee_id',
        'consultation_type_id',
        'price',
        'marking_at',
        'created_by',
        'updated_by'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function consultationType(){
        return $this->belongsTo(ConsultationType::class);
    }

}
