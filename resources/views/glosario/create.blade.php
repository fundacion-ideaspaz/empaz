@extends('layouts.master') @section('title', 'Glosario - Crear') @section('content')

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
          {{Form::bsSubmit('Guardar', ['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
</div>

@endsection
