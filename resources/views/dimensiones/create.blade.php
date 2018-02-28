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
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">Archivo adjutno</label>
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
                <h4>Descripción de la calificación</h4>
                <div class="form-group">
                    <label for="enunciados">Bajo (0-10%)</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio bajo (11-30%)</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio (31-60%)</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio alto (61-85%)</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Alto (86-100%)</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Descripción" required>
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