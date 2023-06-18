<?php

namespace App\Models;

use App\Utils\SelectorValues;
use Exception;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function selectors(){
        return new SelectorValues("specialty",[
                "name" => "Nome"
            ]);
    }

    public function existsEmployee($employee_id) : bool{
        try{
            $obj = Specialty::join('employee_specialty','specialty_id','specialties.id')
                    ->where('specialties.id',$this->id)
                    ->where('employee_id',$employee_id)
                    ->first();
            return isset($obj->id);
        }catch(Exception){
            return false;
        }
    }

}
