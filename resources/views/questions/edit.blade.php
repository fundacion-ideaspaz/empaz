@extends('layouts.master') @section('title', 'Editar Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar pregunta</h1>
            </div>
            <form action="/preguntas/{{$pregunta->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(!$canEditEstado)
                <div class="alert alert-warning">
                  <p>Esta pregunta se encuentra asociada un cuestionario, por tanto no puede ser desactivada.</p>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <textarea type="text" rows="1.5" class="form-control" name="nombre">{{$pregunta->nombre}}</textarea>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{$pregunta->descripcion}}</textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    @if(!$canEditEstado)
                    <select name="estado" id="estado" class="form-control" readonly >
                        <option value="activo" {{$pregunta->estado === 'activo' ? "selected" : 'disabled' }}>Activo</option>
                        <option value="inactivo" {{$pregunta->estado === 'inactivo' ? "selected" : 'disabled' }}>Inactivo</option>
                    </select>
                    @else
                    <select name="estado" id="estado" class="form-control" >
                        <option value="activo" {{$pregunta->estado === 'activo' ? "selected" : '' }}>Activo</option>
                        <option value="inactivo" {{$pregunta->estado === 'inactivo' ? "selected" : '' }}>Inactivo</option>
                    </select>
                    @endif
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
                    @foreach($pregunta->opcionesRespuestas as $opcion)
                    @if($opcion->number != 5 && $opcion->number != 6)
                    <label for="respuesta_{{$opcion->id}}">
                        Respuesta {{ $opcion->number}}
                    </label>
                    <textarea type="text" rows="1.5" name="respuestas[{{$opcion->id}}]" id="respuesta_{{$opcion->id}}" class="form-control" >{{$opcion->descripcion}}</textarea>
                    @elseif($opcion->number === 5)
                    <label for="respuesta_{{$opcion->id}}">
                        Respuesta N/A
                    </label>
                    <textarea type="text" rows="1.5" name="respuestas[{{$opcion->id}}]" id="respuesta_{{$opcion->id}}" class="form-control" >{{$opcion->descripcion}}</textarea>
                    @endif
                    @endforeach
                </div>
                <div class="from-group">
                    <a href="/preguntas" class="btn btn-warning">Atrás</a>
                    <input type="submit" class="btn btn-primary pull-right" value="Guardar">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
