<?php

namespace App\Models;

use App\Utils\SelectorValues;
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

    public static function selectors(){
        return new SelectorValues(route('specialty.search'),"specialty",[
                "name" => "Nome"
            ]);
    }

}
