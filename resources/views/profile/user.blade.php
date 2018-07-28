@extends('layouts.master') @section('title', 'Perfil') @section('content')

<!-- Caffeine -->
<meta name="caffeinated" content="false">


<div class="row indicadores-form">
  <div class="card col-12">
        <div class="card-body">
            <div class="row header">
            <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div>
            <div class="col-md-7"><h1>{{Auth::user()->nombre}}</h1></div>
            <div class="col-md-3">
        </div>
      </div>
      </div>
            <div class="row cuerpo">
            <div class="col-md-6">
                <span class="label">Rol:</span> {{ Auth::user()->role }}
            </div>
            <div class="col-md-6">
                <span class="label">Email:</span> {{ Auth::user()->email }}
            </div>

            </div>

    </div>
</div>
@endsection
