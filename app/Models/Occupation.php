<?php

namespace App\Models;

use App\Utils\SelectorValues;
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

    public static function selectors(){
        return new SelectorValues(route('occupation.search'),"occupation",[
            "position" => "Nome",
            "description" => "Descrição"
        ]);
    }

    public static function selectorsEmployee($action="create"){
        $selector = Occupation::selectors();
        $selector->url=route('employee.search.occupation');
        $selector->name="employee_occupation";
        $selector->action = $action;
        return $selector;
    }

}
