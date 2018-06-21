@extends('layouts.master') @section('title', 'Editar Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar Indicador</h1>
            </div>
            <form action="/indicadores/{{$indicador->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(!$canEditEstado)
                <div class="alert alert-warning">
                  <p>Este indicador se encuentra asociado un cuestionario, por tanto no puede ser desactivado.</p>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$indicador->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{$indicador->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    @if(!$canEditEstado)
                    <select name="estado" id="estado" class="form-control" readonly >
                        <option value="activo" {{$indicador->estado === 'activo' ? "selected" : 'disabled' }}>Activo</option>
                        <option value="inactivo" {{$indicador->estado === 'inactivo' ? "selected" : 'disabled' }}>Inactivo</option>
                    </select>
                    @else
                    <select name="estado" id="estado" class="form-control" >
                        <option value="activo" {{$indicador->estado === 'activo' ? "selected" : '' }}>Activo</option>
                        <option value="inactivo" {{$indicador->estado === 'inactivo' ? "selected" : '' }}>Inactivo</option>
                    </select>
                    @endif
                </div>
                <div class="from-group">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
