<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class NotaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Autenticamos con el email del usuario de la session actual
        $user_email = auth()->user()->email;
        $all_notes = Nota::where('usuario', $user_email)->paginate(5);
        return view('notes.all', compact('all_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valida si los input no vienen vacios
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $note = new Nota; // Instanciamos una clase del modelo Note

        //Obtenemos los datos de los input del form
        $note -> nombre = $request -> name;
        $note -> descripcion = $request -> description;
        $note -> usuario = auth() -> user() -> email;

        $note -> save(); //Guardamos en la BD

        return back() -> with('messagge', 'Added note!'); //Retornamos con msj


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
