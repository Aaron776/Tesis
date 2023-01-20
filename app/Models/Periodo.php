<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable=['nombre','descripcion','fecha_inicio','fecha_fin'];

    public function distributivos(){
        return $this->hasMany(Distributivo::class,'id');
    }
}
