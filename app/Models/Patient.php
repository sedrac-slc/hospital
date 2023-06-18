<?php

namespace App\Models;

use App\Utils\SelectorValues;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'created_by',
        'updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
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
