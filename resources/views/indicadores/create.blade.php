@extends('layouts.master') @section('title', 'Crear Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Crear Indicador</h1>
            </div>
            <form action="/indicadores" method="post" class="form" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
        </div>
        <div class="from-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
                
        </form>
    </div>
</div>
@endsection