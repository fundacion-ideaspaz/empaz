@extends('layouts.master') @section('title', 'Perfil Empresa') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
        <div class="card-body">
            <div class="row header">
            <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div>
            <div class="col-md-7"><h1>{{Auth::user()->nombre}}</h1></div>
            <div class="col-md-3"> @if(Auth::user()->role === 'superadmin')
      <a class="btn btn-primary" href="/users">Panel de administración</a>
      @endif
      @if(Auth::user()->role === 'experto')
      <a class="btn btn-primary" href="/cuestionarios">Panel de administración</a>
      @endif
        </div></div>
            </div>
            <div class="row cuerpo">
            <div class="col-md-6">
                <span class="label">Role:</span> {{ Auth::user()->role }}
            </div>
            <div class="col-md-6">
                <span class="label">Email:</span> {{ Auth::user()->email }}
            </div>
    
            </div>
            
    </div>
</div>
@endsection