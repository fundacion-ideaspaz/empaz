@extends('layouts.master') @section('title', 'Editar Dimensión') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar Dimensión</h1>
            </div>
            <form action="/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="nombre" value="{{$dimension->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" value="{{ old('descripcion') }}" id="descripcion" class="form-control">{{$dimension->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="file">Archivo adjunto</label>
                    <input type="file" name="logo" value="{{ old('logo') }}" id="logo" class="form-control">
                    <small id="passwordHelp" class="form-text text-muted">
                        No necesitas cambiar el logo. Si dejas este campo en blanco, el logo permanecerá igual.
                    </small>
                    <img src="{{asset('storage/'.$dimension->logo)}}" alt="logo-{{$dimension->nombre}}">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control" @if(!$canEditEstado) disabled="disabled" @endif>
                        <option value="activo" @if($dimension->estado === "activo") selected @endif>Activo</option>
                        <option value="inactivo" @if($dimension->estado === "inactivo") selected @endif>Inactivo</option>
                    </select>
                </div>
                <h4>Descripción de la calificación</h4>
                @foreach($enunciados as $enunciado)
                <div class="form-group">
                    <label for="enunciados">{{ucfirst($enunciado->nivel_importancia)}}</label>
                    <input type="text" class="form-control" name="enunciados[]" placeholder="{{ucfirst($enunciado->nivel_importancia)}}" required
                        value="{{$enunciado->descripcion}}">
                </div>
                @endforeach
                <div class="from-group">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    var estado = $( "#estado" ).val();
    console.log(estado);
    if($('#estado').val().trim() === ''){
        $(this).val(stado);
    }
});
</script>
@endsection

