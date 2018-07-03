@extends('layouts.master') @section('title', 'FAQs - Crear') @section('content')

<div class="row">
<div class="col-12 card">
<h2>Crear FAQ</h2>
        {!! Form::open(['action' => 'FaqController@store', 'method' =>'POST']) !!}
        <div class="form-group">
          {{Form::bsLabel('Pregunta')}}
          {{Form::bsText('question', '', ['placeholder'=>'Ingrese la pregunta'])}}
        </div>
        <div class="form-group">
          {{Form::bsLabel('Respuesta')}}
          {{Form::bsTextArea('answer', '', ['placeholder'=>'Ingrese la respuesta correspondiente'])}}
        </div>
        <div class="table-row">
          {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary pull-right'])}}
          <a href="/faqs" class="btn btn-warning">Atrás</a>
        </div>
        {!!Form::close()!!}
</div>
</div>

@endsection
