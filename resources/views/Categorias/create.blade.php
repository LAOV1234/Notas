@extends('layouts.plantilla')
@section('titulo', 'Nueva Categoría')

<style>
    h1 {
        font-family: 'Arial', sans-serif;
        color: #fff;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        padding: 15px;
        background-color: #3498db; /* Color de fondo azul */
        border: 3px solid #2980b9; /* Color del borde azul más oscuro */
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75); /* Sombra */
    }

    
    .form-floating.mb-3 {
        margin-bottom: 15px;
    }

    
    label[for="color"] {
        display: block;
        margin-bottom: 5px;
    }
</style>
@section('contenido')

<h1>{{ isset($categoria) ? 'Editar Categoría' : 'Crear Nueva Categoría' }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ isset($categoria) ? route('categorias.update', $categoria->id) : route('categorias.store') }}">
    @if(isset($categoria))
        @method('put')
    @endif
    @csrf

    <div class="row">
        <div class="form-floating col-md-12 mb-3">
            <input type="text" class="form-control" id="nombre_c" placeholder="Nombre" name="nombre_c" value="{{ isset($categoria) ? $categoria->nombre_c : old('nombre_c') }}">
            <label for="nombre_c">Nombre</label>
            
        </div>
        

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="{{ route('notas.index') }}">Cancelar</a>
</form>

@endsection
