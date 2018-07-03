@extends('layouts.master') @section('title', 'FAQs - Editar') @section('content')
<div class="row">
<div class="col-12 card">
<h2>Editar FAQ</h2>
        {!! Form::open(['action' => ['FaqController@update', $faq->id], 'method' =>'POST']) !!}
        <div class="form-group">
          {{Form::bsLabel('Pregunta')}}
          {{Form::bsText('question', $faq->question)}}
        </div>
        <div class="form-group">
          {{Form::bsLabel('Respuesta')}}
          {{Form::bsTextArea('answer', $faq->answer)}}
        </div>
          {{ Form::hidden('_method', 'PUT') }}
          <div class="table-row">
            {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary pull-right'])}}
            <a href="/faqs" class="btn btn-warning">Atrás</a>
          </div>
        {!!Form::close()!!}
</div>
</div>

@endsection
