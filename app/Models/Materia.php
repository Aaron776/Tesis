<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Materia extends Model
{
    use HasFactory;

    protected $fillable=['id_escuela','nombre','horas_semanas'];

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

    public function escuelas(){
        return $this->belongsTo(Escuela::class,'id_escuela'); 
    }

    public function distributivos(){
        return $this->hasMany(Distributivo::class,'id');
    }

}
