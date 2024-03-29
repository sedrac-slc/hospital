<?php

namespace App\Models;

use App\Utils\SelectorValues;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'occupation_id',
        'created_by',
        'updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }

    public function specialties(){
        return $this->belongsToMany(Specialty::class);
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public static function selectors(){
        return new SelectorValues("employee",[
            'name' => 'Nome',
            'email' => 'Email',
            'birthday' => 'Aniversário',
            'phone' => 'Contacto',
            'gender' => 'Gênero',
            'naturalness' => 'Nacionalidade',
            'nationality' => 'Naturalidade'
        ]);
    }

}
