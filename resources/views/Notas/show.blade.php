@extends('layouts.plantilla')

@section('titulo', 'Detalles de la Nota')

@section('contenido')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            Detalles de la Nota: {{ $nota->titulo }}
        </div>
        <div class="card-body text-center">
            <p class="card-text">{{ $nota->contenido }}</p>
            <p class="card-text">Fecha: {{ $nota->fecha }}</p>
            <p class="card-text">Etiqueta: {{ $nota->etiqueta }}</p>
            <a href="{{ route('notas.index') }}" class="btn btn-primary">Atrás</a>
        </div>
    </div>
@endsection
