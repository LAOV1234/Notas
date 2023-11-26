@extends('layouts.plantilla')
@section('titulo', 'Nueva Nota')

<style>
     h1 {
        font-family: 'Arial', sans-serif;
        color: #fff;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        padding: 15px;
        background-color: #9b59b6; 
        border: 3px solid #8e44ad; 
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75); 
    }

    
</style>
@section('contenido')

<h1>{{ isset($formulario) ? 'Editar Nota' : 'Crear Nueva Nota' }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ isset($formulario) ? route('notas.update', $formulario->id) : route('notas.store') }}">
    @if(isset($formulario))
        @method('put')
    @endif
    @csrf

    <div class="row">
        <div class="form-floating col-md-12 mb-3">
            <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo" value="{{ isset($formulario) ? $formulario->titulo : old('titulo') }}">
            <label for="titulo">Titulo</label>
        </div>
        
        <div class="form-floating col-md-12 mb-3">
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ isset($formulario) ? $formulario->fecha : now()->toDateString() }}" readonly>
            <label for="fecha">Fecha</label>
        </div>
        
        <div class="form-floating col-md-12 mb-3">
            <textarea class="form-control" placeholder="Contenido" id="contenido" name="contenido" style="height: 200px;">{{ isset($formulario) ? $formulario->contenido : old('contenido') }}</textarea>
            <label for="contenido">Contenido</label>
        </div>
        
        <div class="form-floating col-md-12 mb-3">
            <input type="text" class="form-control" id="etiqueta" placeholder="Etiqueta" name="etiqueta" value="{{ isset($formulario) ? $formulario->etiqueta : old('etiqueta') }}" >
            <label for="etiqueta">Etiqueta</label>
        </div>
        
        <div class="form-floating col-md-12 mb-3">
            <select class="form-select" name="categoria_id">
                <option value="">Seleccionar categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        @if(isset($formulario) && $formulario->categoria_id == $categoria->id)
                            selected
                        @endif
                    >{{ $categoria->nombre_c }}</option>
                @endforeach
            </select>
            <label for="categoria_id">Categoría</label>
        </div>

        <div class="col-md-12 mb-3 text-center">
        <label for="color">Color</label>
        <input type="color" id="color" name="color" value="#ffffff" style="width: 20%;">
        
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="{{ route('notas.index') }}">Cancelar</a>
</form>

@endsection
