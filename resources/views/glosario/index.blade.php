@extends('layouts.master') @section('title', 'Glosario') @section('content')
<!-- Caffeine -->
<meta name="caffeinated" content="false">

<div class="row">
<div class="col-12 card">
  <div class="row">
    <div class="col-sm-8">
      <h2>Glosario</h2>
    </div>
      @if(Auth::user())
      @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
      <div class="col-sm-4">
      <a href="/glosario/create" class="btn btn-primary btn-sm pull-right" title="Agregar"> <span class="fa fa-plus"></span></a>
      </div>
      @endif
      @endif
  </div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(count($terminos))
  <div id="accordion" role="tablist">
    @foreach($terminos as $terminoGlosario)
  <div class="card">
    <div class="card-header" role="tab" id="heading{{$terminoGlosario->id}}">
      <h5 class="mb-0">
        <div class="row">
          <div class="col-sm-10">
            <a class="collapsed" data-toggle="collapse" href="#collapse{{$terminoGlosario->id}}" aria-expanded="true" aria-controls="collapse{{$terminoGlosario->id}}">
              {{$terminoGlosario->keyword}}
            </a>
          </div>
          <div class="col-sm-2">
            @if(Auth::user())
            @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
            {!! Form::open(['action' => ['GlosarioController@destroy', $terminoGlosario->id], 'method' =>'POST', 'class' =>  'pull-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger borrar btn-sm list-button', 'title' => 'Eliminar' ]) !!}
            {!! Form::close() !!}
            <a href="/glosario/{{$terminoGlosario->id}}/edit" class="btn btn-primary editar btn-sm pull-right list-button" title="Editar"> <span class="fa fa-edit"></span></a>
            @endif
            @endif
          </div>
        </div>
      </h5>
    </div>

    <div class="collapse" id="collapse{{$terminoGlosario->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$terminoGlosario->id}}" data-parent="#accordion">
      <div class="card-body">
        <p>{{$terminoGlosario->meaning}}</p>
      </div>
    </div>
  </div>
  @endforeach
 </div>
 <div class="row">
   <div class="col-sm-6 col-sm-offset-5">
     {{ $terminos->render() }}
   </div>
 </div>
 @else
 <h5>No hay entradas disponibles en el glosario.</p>
 @endif
</div>
</div>
@endsection
