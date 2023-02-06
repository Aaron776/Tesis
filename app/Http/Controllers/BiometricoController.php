<?php

namespace App\Http\Controllers;

use App\Models\Biometrico;
use App\Models\Distributivo;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BiometricoController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:ver-biometrico|marcar-biometrico')->only('index');
         $this->middleware('permission:marcar-biometrico', ['only' => ['create','store']]);
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
        $datos=Biometrico::where('id_distributivo','=',$id)->get();
        $pdf=PDF::loadView('reporte.pdf',compact('datos'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }



    public function create()
    {
        $user=Auth::user();
        $datos=Biometrico::all();
        $materia=Distributivo::where('id_usuario','=',$user->id)->pluck('materia','id');
        return view('biometrico.crear',compact('datos','materia'));
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
            'fecha_registro'=>'required'
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
