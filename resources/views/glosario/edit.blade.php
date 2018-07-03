@extends('layouts.master') @section('title', 'Glosario - Editar') @section('content')
<div class="row">
<div class="col-12 card">
<h2>Editar entrada</h2>
        {!! Form::open(['action' => ['GlosarioController@update', $terminoGlosario->id], 'method' =>'POST']) !!}
        <div class="form-group">
          {{Form::bsLabel('Entrada')}}
          {{Form::bsText('keyword', $terminoGlosario->keyword)}}
        </div>
        <div class="form-group">
          {{Form::bsLabel('Significado')}}
          {{Form::bsTextArea('meaning', $terminoGlosario->meaning)}}
        </div>
          {{ Form::hidden('_method', 'PUT') }}
          <div class="table-row">
            {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary pull-right'])}}
            <a href="/glosario" class="btn btn-warning">Atrás</a>
          </div>
        {!!Form::close()!!}
</div>
</div>
</div>

@endsection
