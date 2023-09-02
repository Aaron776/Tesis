<?php

namespace App\Http\Controllers;

use App\Models\Biometrico;
use App\Models\Distributivo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class BiometricoController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:ver-biométrico')->only('index');
         $this->middleware('permission:marcar-biométrico', ['only' => ['create','store']]);
         $this->middleware('permission:generar-reporte')->only('crearPDF');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $ruta=Route::current()->parameter('id');
        $biometrico=Biometrico::where('id_distributivo','=',$id)->get(); 
        return view('biometrico.index',compact('biometrico','ruta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function crearPDF($id)
    {
        $datos=Biometrico::where('id_distributivo','=',$id)->get(); // esto realiza una consulta en la base de datos utilizando el modelo Biometrico y el método where. La consulta busca todos los registros de la tabla biometricos donde el valor de la columna id_distributivo sea igual a la variable $id, En resumen, esta línea de código obtiene los registros de la tabla biometricos que corresponden al id_distributivo especificado y los almacena en la variable $datos..
        $pdf=PDF::loadView('reporte.pdf',compact('datos'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }



    public function create()
    {
        $user=Auth::user(); // aqui ntraigo el usuario que esta actualmente autenticado en la aplicacion
        $materia=Distributivo::where('id_usuario','=',$user->id)->select('materia','id','dia','id_materia')->get(); //  realiza una consulta en la base de datos utilizando el modelo Distributivo y el método where. La consulta busca todos los registros de la tabla distributivos donde el valor de la columna id_usuario sea igual al id del usuario actual ($user->id), El método select especifica qué columnas de la tabla deben ser seleccionadas en la consulta. En este caso, se seleccionan las columnas materia, id, dia e id_materia, En resumen, esta línea de código obtiene los registros de la tabla distributivos que corresponden al id del usuario actualmente autenticado y selecciona las columnas materia, id, dia e id_materia, y los almacena en la variable $materia.
        return view('biometrico.crear',compact('materia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_distributivo'=>'required',
            'hora_entrada'=> 'required',
            'hora_salida'=> 'required',
            'estado' => 'required',
            'fecha_registro'=>'required',
            'estado'=>'required'
        ]);
        Biometrico::create($request->all());
        return redirect()->route('biometrico.create')->with('success','!Registro exitoso¡');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
