@extends('layouts.master') @section('title', 'FAQs') @section('content')


<h2>Preguntas frecuentes
@if(Auth::user())
  @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
      <a href="/faqs/create" class="btn btn-primary btn-sm pull-right" title="Agregar"> <span class="fa fa-plus"></span></a>
  @endif
@endif
</h2>
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
          {!! Form::button('<span class="fa fa-trash"></span>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm list-button', 'title' => 'Eliminar' ]) !!}
          {!! Form::close() !!}
          <a href="/faqs/{{$faq->id}}/edit" class="btn btn-secondary btn-sm pull-right list-button" title="Editar"> <span class="fa fa-edit"></span></a>
          @endif
        @endif
      </h5>
    </div>

    <div class="collapse" id="collapse{{$faq->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
      <div class="card-body">
        <p>{{$faq->answer}}</p>
      </div>
    </div>
  </div>
  @endforeach
 </div>
 @else
 <h5>No hay preguntas frecuentes disponibles.</p>
 @endif

@endsection
