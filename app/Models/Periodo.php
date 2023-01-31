<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Periodo extends Model
{
    use HasFactory;

    protected $fillable=['nombre','descripcion','fecha_inicio','fecha_fin'];

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

    protected function descripcion():Attribute{
        return new Attribute(
            set:function($value){
                return ucwords($value);
            },

            get:function($value){
                return ucwords($value);
            }

        );
    }

    public function distributivos(){
        return $this->hasMany(Distributivo::class,'id');
    }
}
