@extends('layouts.plantilla')

@section('titulo', 'Notas')

@section('contenido')
    <h3 class='text-center'><em>✨Notas del Usuario {{ Auth::user()->name }}✨</em></h3>

    @if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row">
    @forelse($notas as $nota)
        @if($nota->user_id === Auth::user()->id)
            <div class="col-4 mb-3">
                <div class="nota-card">
                    <div class="nota-card-header d-flex justify-content-between" style="background-color: {{ $nota->color ?? '#FFFFFF' }}; padding: 10px;">
                        <span>{{ $nota->titulo }}</span>
                        <a href="{{ route('notas.show', $nota->id) }}" class="btn btn-dark btn-sm text-white">Detalles</a>
                    </div>
                    <div class="nota-card-body" style="padding: 10px;">
                        <p class="card-text">{{ $nota->fecha }}</p>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $nota->etiqueta }}" readonly>
                    </div>
                    <div class="nota-card-footer" style="padding: 10px;">
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
        @endif
    @empty
        <div class="col-12">
            <p class= "text-center">No hay notas disponibles para este usuario.</p>
        </div>
    @endforelse
</div>

    <div class="d-flex justify-content-center">
        {{ $notas->links() }}
    </div>
@endsection
