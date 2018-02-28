@extends('layouts.master') @section('title', 'Editar Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar Indicador</h1>
            </div>
            <form action="/indicadores/{{$indicador->id}}" method="post" class="form" enctype="multipart/form-data">
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
                    <select name="estado" id="estado" class="form-control" @if(!$canEditEstado) disabled="disabled" @endif>
                        <option value="activo" @if($indicador->estado === "activo") selected @endif>Activo</option>
                        <option value="inactivo" @if($indicador->estado === "inactivo") selected @endif>Inactivo</option>
                    </select>
                </div>
                <div class="from-group">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection