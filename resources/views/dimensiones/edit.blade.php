@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <form action="/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$dimension->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$dimension->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="file">Logo de la dimension</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                    <small id="passwordHelp" class="form-text text-muted">
                                No necesitas cambiar el logo. Si dejas este campo en blanco, el logo permanecerá igual.
                            </small>
                    <img src="{{asset("storage/".$dimension->logo)}}" alt="logo-{{$dimension->nombre}}">
                </div>
                <div class="form-group">
                    <label for="importancia">Nivel de importancia</label>
                    <br>
                    <input name="nivel_importancia" value="{{$dimension->nivel_importancia}}" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]"
                        data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]' data-slider-min="1" data-slider-max="5"
                        data-slider-step="1" data-slider-value="{{$dimension->nivel_importancia_int()}}" data-slider-tooltip="hide"
                    />
                </div>
                <h4>Enunciados</h4>
                @foreach($enunciados as $enunciado)
                <div class="form-group">
                    <label for="enunciados">{{ucfirst($enunciado->nivel_importancia)}}</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="{{ucfirst($enunciado->nivel_importancia)}}" required value="{{$enunciado->descripcion}}">
                </div>
                @endforeach
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