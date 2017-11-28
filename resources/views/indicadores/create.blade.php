@extends('layouts.master') @section('title', 'Crear Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Crear Indicador</h1>
            </div>
            <form action="/indicadores" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
        </div>
        <div class="from-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        @if ($errors->any())
        
        </form>
    </div>
</div>
@endsection