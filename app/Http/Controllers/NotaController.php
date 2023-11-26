<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notas = Nota::where('user_id', $user->id)->paginate(9);

        return view('notas.index')->with('notas', $notas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::where('user_id', Auth::id())->get();
        return view('notas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'contenido'=>'required',
            'fecha'=>'required',
            'etiqueta'=>'regex:/[A-Za-z]+$/i',
        ]);

        $user = Auth::user();

        $nuevaNota = new Nota();
        $nuevaNota->titulo = $request->input('titulo');
        $nuevaNota->contenido = $request->input('contenido');
        $nuevaNota->fecha = $request->input('fecha');
        $nuevaNota->etiqueta = $request->input('etiqueta');
        $nuevaNota->color = $request->input('color');
        $nuevaNota->user_id = $user->id;
        $nuevaNota->categoria_id = $request->input('categoria_id'); 
        
        if($nuevaNota->save()){
            return redirect()->route('notas.index')->with('mensaje', 'Nota guardada con exito');
        }
        else{
            return redirect()->route('notas.index')->with('mensaje', 'Error, la nota no se guardo');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nota = Nota::findOrFail($id);

    
    if ($nota->user_id === Auth::user()->id) {
        return view('notas.show', ['nota' => $nota]);
    } else {
        
        return redirect()->route('notas.index')->with('mensaje', 'No tienes permiso para ver esta nota');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nota = Nota::findOrFail($id);
        $categorias = Categoria::where('user_id', Auth::id())->get();
        return view('notas.create', ['formulario' => $nota, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrFail($id);

        $request->validate([
            'titulo'=>'required',
            'contenido'=>'required',
            'fecha'=>'required',
            'etiqueta' => 'nullable|string',
        ]);


        $nota->titulo = $request->input('titulo');
        $nota->contenido = $request->input('contenido');
        $nota->fecha = $request->input('fecha');
        $nota->etiqueta = $request->input('etiqueta');
        $nota->color = $request->input('color');
        $nota->categoria_id = $request->input('categoria_id'); 
        

        if ($nota->save()) {
            return redirect()->route('notas.index')->with('mensaje', 'Nota actualizada con éxito');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'Error al actualizar la nota');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nota = Nota::findOrFail($id);
        
        $nota->delete();

        return redirect()->route('notas.index')->with('mensaje', 'Nota eliminada con éxito');
    }
}
