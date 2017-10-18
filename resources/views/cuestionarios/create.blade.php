@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h3>Crear Pregunta</h3>
            <form action="/cuestionarios" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="version">Version</label>
                    <input type="number" class="form-control" name="version">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <h5>Preguntas</h5>
                <p>Seleccione las preguntas del cuestionario</p>
                @foreach($preguntas as $pregunta)
                <div class="form-group">
                    <label class="form-check-label">
                        <input class="form-check-input" name="preguntas[]" type="checkbox" value="{{$pregunta->id}}"> {{$pregunta->nombre}}
                    </label>
                </div>
                @endforeach
        </div>
        <div class="from-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </form>
    </div>
</div>
@endsection