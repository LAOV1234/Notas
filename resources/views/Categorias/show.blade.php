@extends('layouts.plantilla')

@section('titulo', 'Notas por Categoría')

@section('contenido')
    <h3 class='text-center'><em>✨Notas por Categoría✨</em></h3>

    @if($notas->isNotEmpty())
        <div class="row">
            @foreach($notas as $nota)
                <div class="col-4 mb-3">
                    <div class="nota-card">
                        <div class="nota-card-header" style="background-color: {{ $nota->color ?? '#FFFFFF' }};">
                            <span>{{ $nota->titulo }}</span>
                        </div>
                        <div class="nota-card-body">
                            <p>{{ $nota->fecha }}</p>
                            <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $nota->etiqueta }}" readonly>
                        </div>
                        <div class="nota-card-footer">
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class = "text-center">No hay notas disponibles para esta categoría.</p>
    @endif
@endsection
