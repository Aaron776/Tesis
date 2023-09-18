<?php

namespace App\Http\Controllers;

use App\Models\Distributivo;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DistributivoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-distributivo', ['only' => ['index']]);
         $this->middleware('permission:crear-distributivos', ['only' => ['create']]);
         $this->middleware('permission:crear-distributivos', ['only' => ['store']]);
    
         
    }
    public function index($id){
        $distributivos=Distributivo::where('id_usuario','=',$id)->get();
        return view('distributivo.index',compact('distributivos'));    
    }

    public function create(){
        $periodos=Periodo::pluck('nombre','id');
        $materias=Materia::pluck('nombre','id');

        $rol = Role::where('name', 'Docente Invitado')->first(); // aqui traigo el rol solo del Docente Invitado 
        $usuarios=$rol->users->pluck('name','id'); // aqui traigo los usuarios que tiene ese rol
        //$usuarios=User::pluck('name','id');
        return view('distributivo.crear',compact('periodos','materias','usuarios'));
    }

    public function store(Request $request){
        $request->validate([
            'id_usuario'=>'required',
            'id_materia'=> 'required',
            'id_periodo'=> 'required',
            'tipo_clase' => 'required',
            'dia'=>'required|string',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
            'tipo_clase'=>'required',
        ]);

        Distributivo::create($request->all());
        return redirect()->route('distributivo.create')->with('success','!Distributivo asignado con éxito¡');
    }
}
