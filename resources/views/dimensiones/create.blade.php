@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <form action="/dimensiones/" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="file">Logo de la dimension</label>
                    <br>
                    <!-- <label class="custom-file"> -->
                    <input type="file" name="logo" id="logo" class="form-control">
                    <!-- <span class="custom-file-control"></span> -->
                    </label>
                </div>
                <div class="form-group">
                    <label for="importancia">Nivel de importancia</label>
                    <br>
                    <input name="nivel_importancia" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]" data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]'
                        data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1" data-slider-tooltip="hide"
                    />
                </div>
                <h3>Enunciados</h3>
                <div class="form-group">
                    <label for="enunciados">Bajo</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Bajo" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Medio</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Medio" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Alto</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Alto" required>
                </div>
                <div class="form-group">
                    <label for="enunciados">Muy Alto</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="Muy Alto" required>
                </div>
        </div>
        <div class="from-group">
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
</div>
@endsection