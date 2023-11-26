<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as IlluminateRequest;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
    $categorias = Categoria::where('user_id', $user->id)->get();

    return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_c' => 'required',
        ]);
        
        
        $user = Auth::user();
        
        
        $nuevaCategoria = new Categoria();
        $nuevaCategoria->nombre_c = $request->input('nombre_c');
        $nuevaCategoria->user_id = $user->id;
        
        
        if($nuevaCategoria->save()) {
            $categorias = Categoria::where('user_id', $user->id)->get();
            return redirect()->route('categorias.index', compact('categorias'))->with('mensaje', 'Categoría guardada con éxito');
        } else {
            return redirect()->route('categorias.index')->with('mensaje', 'Error, la categoría no se guardó');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $notas = $categoria->notas()->where('user_id', Auth::id())->get();

        return view('categorias.show')->with('categoria', $categoria)->with('notas', $notas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    public function destroy($id)
{
    $categoria = Categoria::findOrFail($id);

    
    if ($categoria->user_id !== Auth::id()) {
        return redirect()->route('categorias.index')->with('mensaje', 'No tienes permiso para eliminar esta categoría');
    }

    
    $categoria->notas()->delete();
    $categoria->delete();

    return redirect()->route('categorias.index')->with('mensaje', 'Categoría eliminada correctamente');
}

}

