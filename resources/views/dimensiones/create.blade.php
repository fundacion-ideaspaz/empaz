@extends('layouts.master') @section('title', 'Crear Dimensión') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Crear Dimensión</h1>
            </div>
            <form action="/dimensiones" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" maxlength="191">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label><br>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control" >{{ old('descripcion') }}</textarea>
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
                    <label for="enunciados">Bajo (0-15%)</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" placeholder="Enunciado para nivel bajo"></textarea>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio bajo (16-40%)</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" placeholder="Enunciado para nivel medio bajo"></textarea>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio (41-60%)</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" placeholder="Enunciado para medio"></textarea>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio alto (61-85%)</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" placeholder="Enunciado para medio alto"></textarea>
                </div>
                <div class="form-group">
                    <label for="enunciados">Alto (86-100%)</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" placeholder="Enunciado para nivel alto"></textarea>
                </div>
        </div>
        <div class="from-group">
            <a href="/dimensiones" class="btn btn-warning">Atrás</a>
            <input type="submit" class="btn btn-primary pull-right" value="Guardar">
        </div>

        </form>
    </div>
</div>
</div>
@endsection
