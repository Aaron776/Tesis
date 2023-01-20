<?php

namespace App\Http\Controllers;

use App\Models\Biometrico;
use App\Models\Distributivo;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

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
    public function index()
    {
        $biometricos=Biometrico::all();
        return view('biometrico.index',compact('biometricos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function crearPDF($id)
    {
        $datos=Biometrico::find($id);
        $pdf=PDF::loadView('reporte.pdf',compact('datos'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }



    public function create()
    {
        $datos=Biometrico::pluck('id_distributivo');
        return view('biometrico.crear',compact('datos'));
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
            'hora_entrada'=> 'required',
            'hora_salida'=> 'required',
            'estado' => 'required'
        ]);
        Biometrico::create($request->all());

        /*User::all()->except($biometrico->user_id)->each(function(User $user) use ($biometrico){
            $user->notify(new EstadoNotification($biometrico));
        });*/

        return redirect()->route('biometrico.index')->with('success','!Registro exitoso¡');
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
