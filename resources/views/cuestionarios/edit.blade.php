@extends('layouts.master') @section('title', 'Editar Cuestionario') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h2>Editar Cuestionario</h2>
            </div>
            <form action="/cuestionarios/{{$cuestionario->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(!$canEditEstado)
                <div class="alert alert-warning">
                  <p>Este cuestionario ya ha sido diligenciado por uno o más usuarios, para realizar modificaciones genere una nueva versión desde el Panel de Cuestionarios</p>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <text type="text" class="form-control" name="nombre" readonly>{{$cuestionario->nombre}}</text>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{$cuestionario->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="version">Version</label>
                    <text type="number" class="form-control" name="version" readonly>{{$cuestionario->version}}</text>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control">
                        <option value="activo" @if($cuestionario->estado === "activo") selected @endif>Activo</option>
                        <option value="inactivo" @if($cuestionario->estado === "inactivo") selected @endif>Inactivo</option>
                    </select>
                    <select name="canEditEstado" value="{{$canEditEstado}}" hidden></select>
                </div>
                <div class="from-group">
                  <a class="btn btn-warning" href="/cuestionarios">
                    Atrás
                  </a>
                  @if($canEditEstado)
                    <input type="submit" class="btn btn-primary pull-right" value="Siguiente">
                  @else
                    <input type="submit" class="btn btn-primary pull-right" value="Guardar">
                  @endif
                </div>
        </form>
      </div>
    </div>
</div>
@endsection
