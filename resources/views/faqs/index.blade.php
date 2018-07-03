@extends('layouts.master') @section('title', 'FAQs') @section('content')

<div class="row">
<div class="col-12 card">
  <div class="row">
    <div class="col-sm-8">
      <h2>Preguntas frecuentes</h2>
    </div>
    @if(Auth::user())
    @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
    <div class="col-sm-4">
      <a href="/faqs/create" class="btn btn-primary btn-sm pull-right" title="Agregar"> <span class="fa fa-plus"></span></a>
    </div>
    @endif
    @endif
  </div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(count($faqs))
  <div id="accordion" role="tablist">
    @foreach($faqs as $faq)
  <div class="card">
    <div class="card-header" role="tab" id="heading{{$faq->id}}">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
          {{$faq->question}}
        </a>
        @if(Auth::user())
          @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
          {!! Form::open(['action' => ['FaqController@destroy', $faq->id], 'method' =>'POST', 'class' =>  'pull-right']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {!! Form::button('<span class="fa fa-trash "></span>', ['type'=>'submit', 'class'=>'btn btn-danger borrar btn-sm list-button', 'title' => 'Eliminar' ]) !!}
          {!! Form::close() !!}
          <a href="/faqs/{{$faq->id}}/edit" class="btn btn-primary editar btn-sm pull-right list-button" title="Editar"> <span class="fa fa-edit"></span></a>
          @endif
        @endif
      </h5>
    </div>

    <div class="collapse" id="collapse{{$faq->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
      <div class="card-body">
        <p>{!!$faq->answer!!}</p>
      </div>
    </div>
  </div>
  @endforeach
 </div>
 <div class="row">
   <div class="col-sm-6 col-sm-offset-5">
     {{ $faqs->render() }}
   </div>
 </div>
 @else
 <h5>No hay preguntas frecuentes disponibles.</p>
 @endif
</div>
</div>
@endsection
