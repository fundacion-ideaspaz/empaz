@extends('layouts.master') @section('title', 'Panel de Usuarios') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Usuarios</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <p></p>
          <tr>
            <td>{{$user->nombre}}</td>
            <td>{{$user->cargo}}</td>
            <td>{{$user->correo}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a href="/users/new" class="btn btn-primary">Create user</a>
      </div>
    </div>
  </div>
</div>
@endsection