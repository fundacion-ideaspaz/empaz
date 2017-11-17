@extends('layouts.master') @section('title', 'Perfil Empresa') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h1>{{Auth::user()->nombre}}</h1>
      <ul>
        <li>Role: {{ Auth::user()->role }}</li>
        <li>Email: {{ Auth::user()->email }}</li>
      </ul>
      @if(Auth::user()->role === 'superadmin')
      <a class="btn btn-primary" href="/users">Panel de administración</a>
      @endif
      @if(Auth::user()->role === 'experto')
      <a class="btn btn-primary" href="/cuestionarios">Panel de administración</a>
      @endif
    </div>
  </div>
</div>
@endsection