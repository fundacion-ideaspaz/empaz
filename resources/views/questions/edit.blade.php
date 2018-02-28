@extends('layouts.master') @section('title', 'Editar Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar pregunta</h1>
            </div>
            <form action="/preguntas/{{$pregunta->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <input type="text" class="form-control" name="nombre" value="{{$pregunta->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{$pregunta->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tipo_respuesta">Tipo de Respuesta</label>
                    <br>
                    <select name="tipo_respuesta" id="tipo_respuesta" class="form-control" disabled>
                        <option value="tipo_1" {{ $pregunta->tipo_respuesta === 'tipo_1' ? 'selected': ''}}>Tipo 1</option>
                        <option value="tipo_2" {{ $pregunta->tipo_respuesta === 'tipo_2' ? 'selected': ''}}>Tipo 2</option>
                        <option value="tipo_3" {{ $pregunta->tipo_respuesta === 'tipo_3' ? 'selected': ''}}>Tipo 3</option>
                        <option value="tipo_4" {{ $pregunta->tipo_respuesta === 'tipo_4' ? 'selected': ''}}>Tipo 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" @if(!$canEditEstado) disabled="disabled" @endif>
                        <option value="activo" @if($pregunta->estado === "activo") selected @endif >Activo</option>
                        <option value="inactivo" @if($pregunta->estado === "inactivo") selected @endif >Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    @foreach($pregunta->opcionesRespuestas as $opcion)
                    @if($opcion->descripcion != 'No aplica' && $opcion->descripcion != 'No hay información')
                    <label for="respuesta_{{$opcion->id}}">
                        Respuesta {{ $opcion->number}}
                    </label>
                    <input type="text" name="respuestas[{{$opcion->id}}]" id="respuesta_{{$opcion->id}}" class="form-control" value="{{$opcion->descripcion}}"/>
                    @endif
                    @endforeach
                </div>
                <div class="from-group">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection