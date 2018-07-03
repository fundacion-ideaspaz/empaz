@extends('layouts.master') @section('title', 'Glosario - Crear') @section('content')
<div class="row">
<div class="col-12 card">
<h2>Crear nueva entrada</h2>
        {!! Form::open(['action' => 'GlosarioController@store', 'method' =>'POST']) !!}
        <div class="form-group">
          {{Form::bsLabel('Entrada')}}
          {{Form::bsText('keyword', '', ['placeholder'=>'Ingrese el término del glosario'])}}
        </div>
        <div class="form-group">
          {{Form::bsLabel('Significado')}}
          {{Form::bsTextArea('meaning', '', ['placeholder'=>'Ingrese el significado correspondiente'])}}
        </div>
        <div class="table-row">
          {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary pull-right'])}}
          <a href="/glosario" class="btn btn-warning">Atrás</a>
        </div>
        {!!Form::close()!!}
</div>
</div>

@endsection
