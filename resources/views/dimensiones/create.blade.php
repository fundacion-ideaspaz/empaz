@extends('layouts.master') @section('title', 'Crear Dimensión') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Crear Dimensión</h1>
            </div>
            <form action="/dimensiones" method="post" class="form" enctype="multipart/form-data">
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
                    <textarea name="descripcion" id="descripcion" class="form-control">
                        {{ old('descripcion') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="file">Logo de la dimensión</label>
                    <br>
                    <!-- <label class="custom-file"> -->
                    <input type="file" name="logo" value="{{ old('logo') }}" id="logo" class="form-control">
                    <!-- <span class="custom-file-control"></span> -->
                    </label>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <h4>Enunciados</h4>
                <div class="form-group">
                    <label for="enunciados">Bajo</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Bajo" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio bajo</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Medio bajo" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Medio" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio alto</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Medio alto" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Alto</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Alto" required>
                </div>
        </div>
        <div class="from-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        
        </form>
    </div>
</div>
</div>
@endsection