<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Escuela extends Model
{
    use HasFactory;
    
    protected $fillable=['nombre','descripcion']; 

    protected function nombre():Attribute{
        return new Attribute(
            set:function($value){
                return ucwords($value);
            },

            get:function($value){
                return ucwords($value);
            }

        );
    }

    public function materias()
    {
        return $this->hasMany(Materia::class,'id');
    }

}
