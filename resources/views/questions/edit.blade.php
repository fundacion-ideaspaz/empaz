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
                    <input type="text" class="form-control" name="nombre" value="{{$pregunta->nombre}}">
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
