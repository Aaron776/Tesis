<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;
    
    protected $fillable=['nombre','descripcion']; 

    public function materias()
    {
        return $this->hasMany(Materia::class,'id');
    }

}
