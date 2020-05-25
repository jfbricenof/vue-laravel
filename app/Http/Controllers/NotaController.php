<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use Psy\CodeCleaner\ReturnTypePass;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){ //pregunta si estoy haciendo una peticion ajax con vue
            return Nota::where('user_id', auth()->id())->get();//filtro de que el usuario id sea igual al usuario autenticado (logueado)
        }else{
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){ //pregunta si estoy haciendo una peticion ajax con vue
            return Nota::where('user_id', auth()->id())->get();//filtro de que el usuario id sea igual al usuario autenticado (logueado)
        }else{
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->user_id = auth()->id();
        $nota->save();

    return $nota;
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
    public function edit( $id)
    {
        
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
        $nota = Nota::find($id);
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->save();
        return $nota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
    }
}
