@extends('layouts.master') @section('title', 'Archivos') @section('content')

<h2>Carga de Archivos</h2>

{!! Form::open(['action' => 'FilesController@store', 'method'=>'POST', 'files'=>'true'])!!}

<div class="form-group">
  {{Form::bsLabel('Manual: ')}}
  <p>Cargue el archivo PDF del manual (tamaño máximo 5 MB)</p>
  {!!Form::file('manual_file', array('class'=>'form-control', 'accept' => '.pdf'))!!}
</div>

<div class="form-group">
  {{Form::bsLabel('Términos y condiciones: ')}}
  <p>Cargue el archivo PDF de términos y condiciones de uso de la plataforma (tamaño máximo 5 MB)</p>
  {!!Form::file('tc_file', array('class'=>'form-control', 'accept' => '.pdf'))!!}
</div>

{{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary'])}}

{!! Form::close() !!}


@endsection
