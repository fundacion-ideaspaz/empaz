@extends('layouts.master') @section('title', 'Editar Cuestionario') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar Cuestionario</h1>
            </div>
            <form action="/cuestionarios/{{$cuestionario->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$cuestionario->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$cuestionario->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="version">Version</label>
                    <input type="number" class="form-control" name="version" value="{{$cuestionario->version}}" readonly>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control">
                        <option value="activo" @if($cuestionario->estado === "activo") selected @endif>Activo</option>
                        <option value="inactivo" @if($cuestionario->estado === "inactivo") selected @endif>Inactivo</option>
                    </select>
                </div>
        </div>
        <div class="from-group">
            <!-- <a href="/cuestionarios/{{$cuestionario->id}}/dimensiones" class="btn btn-info">
                Dimensiones
            </a> -->
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