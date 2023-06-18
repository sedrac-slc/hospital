<?php

namespace App\Models;

use App\Utils\SelectorValues;
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
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function consultation_type(){
        return $this->belongsTo(ConsultationType::class);
    }

    public static function selectors(){
        return new SelectorValues("consulta",[
            'patient' => 'Paciente',
            'employee' => 'Médico',
            'consultation_type' => 'Tipo consulta',
            'price' => 'Preço'
        ]);
    }

}
