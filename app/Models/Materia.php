<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable=['id_escuela','nombre','horas_semanas'];

    public function escuelas(){
        return $this->belongsTo(Escuela::class,'id_escuela'); 
    }

    public function distributivos(){
        return $this->hasMany(Distributivo::class,'id');
    }

}
