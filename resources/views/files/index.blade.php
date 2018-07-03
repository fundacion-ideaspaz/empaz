@extends('layouts.master') @section('title', 'Archivos') @section('content')

<div class="row">
<div class="col-12 card">


<h2>Carga de Archivos</h2>

<p> <strong>Nota:</strong> Es necesario cargar los dos archivos si se requiere actualizar la información.</p>

{!! Form::open(['action' => 'FilesController@store', 'method'=>'POST', 'files'=>'true'])!!}

<div class="form-group">
  {{Form::bsLabel('Manual: ')}}
  <p>Cargue el archivo PDF del manual (tamaño máximo 5 MB)</p>
  {!!Form::file('manual_file', array('class'=>'form-control image-file', 'accept' => '.pdf'))!!}
</div>

<div class="form-group">
  {{Form::bsLabel('Términos y condiciones: ')}}
  <p>Cargue el archivo PDF de términos y condiciones de uso de la plataforma (tamaño máximo 5 MB)</p>
  {!!Form::file('tc_file', array('class'=>'form-control image-file', 'accept' => '.pdf'))!!}
</div>

{{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary'])}}

{!! Form::close() !!}

</div>
</div>

<script type="text/javascript">
    $('.image-file').bind('change', function() {
        var file_size = this.files[0].size/1024/1024;
        alert('El tamaño de este archivo es: ' + file_size.toFixed(2) + "MB");
    });
</script>

@endsection
