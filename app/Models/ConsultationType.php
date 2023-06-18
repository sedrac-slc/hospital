<?php

namespace App\Models;

use App\Utils\SelectorValues;
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

    public static function selectors(){
        return new SelectorValues("consultation_type",[
            "name" => "Nome",
            "price" => "Preço",
            "description" => "Descrição"
        ]);
    }

}
