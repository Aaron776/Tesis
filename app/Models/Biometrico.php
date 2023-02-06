<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biometrico extends Model
{
    use HasFactory;
    protected $fillable=['id_distributivo','hora_entrada','hora_salida','estado','fecha_registro'];

    public function distributivos(){
        return $this->belongsTo(Distributivo::class,'id_distributivo');
    }
}
