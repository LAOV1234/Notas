@extends('layouts.plantilla')

@section('titulo', 'Categorías')

@section('contenido')
    <h3 class='text-center'><em>✨Categorías del Usuario {{ Auth::user()->name }}✨</em></h3>

    @if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-4 mb-3">
                <div class="nota-card">
                    <div class="nota-card-header">
                        <span>{{ $categoria->nombre_c }}</span>
                    </div>
                    <div class="nota-card-body">
                        
                    </div>
                    <div class="nota-card-footer">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            
                            <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-dark btn-sm text-white mr-2">Ver Notas</a>
                            
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar Categoría</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
