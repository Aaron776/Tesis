<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributivo extends Model
{
    use HasFactory;

    protected $fillable=['id_usuario','id_materia','id_periodo','tipo_clase','materia','dia','hora_inicio','hora_fin'];

    public function materias(){
        return $this->belongsTo(Materia::class,'id_materia');
    }

    public function usuarios(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function periodos(){
        return $this->belongsTo(Periodo::class,'id_periodo');
    }
}
