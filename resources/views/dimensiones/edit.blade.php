@extends('layouts.master') @section('title', 'Editar Dimensión') @section('content')
<div class="row dimensiones-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h2>Editar Dimensión</h2>
            </div>
            <form action="/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(!$canEditEstado)
                <div class="alert alert-warning">
                  <p>Esta dimensión se encuentra asociada un cuestionario, por tanto no puede ser desactivada.</p>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$dimension->nombre}}" maxlength="191">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" value="{{ old('descripcion') }}" id="descripcion" class="form-control">{{$dimension->descripcion}}</textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    @if(!$canEditEstado)
                    <select name="estado" id="estado" class="form-control" readonly >
                        <option value="activo" {{$dimension->estado === 'activo' ? "selected" : 'disabled' }}>Activo</option>
                        <option value="inactivo" {{$dimension->estado === 'inactivo' ? "selected" : 'disabled' }}>Inactivo</option>
                    </select>
                    @else
                    <select name="estado" id="estado" class="form-control" >
                        <option value="activo" {{$dimension->estado === 'activo' ? "selected" : '' }}>Activo</option>
                        <option value="inactivo" {{$dimension->estado === 'inactivo' ? "selected" : '' }}>Inactivo</option>
                    </select>
                    @endif
                </div>
                <h4>Descripción de la calificación</h4>
                @foreach($enunciados as $enunciado)
                <div class="form-group">
                    <label for="enunciados">{{ucfirst($enunciado->nivel_importancia)}}</label>
                    <textarea type="text" rows="1.5" name="enunciados[]" class="form-control" >{{$enunciado->descripcion}}</textarea>
                </div>
                @endforeach
                <div class="from-group">
                  <a href="/dimensiones" class="btn btn-warning">Atrás</a>
                  <input type="submit" class="btn btn-primary pull-right" value="Guardar">
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
