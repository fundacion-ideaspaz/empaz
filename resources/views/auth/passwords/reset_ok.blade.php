@extends('layouts.master') @section('title', 'Restablecimiento Exitoso')

@section('content')
<div class="container recuperar">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2>Restablecimiento de contraseña exitoso</h2>
                </div>
                <div class="panel-body">
                  <p>Usted ha completado el proceso de restablecimiento de contraseña de manera exitosa. Para iniciar sesión en la herramienta EmPaz, ingrese su usuario y su nueva contraseña en la <a href="/home">página de inicio</a>. </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
