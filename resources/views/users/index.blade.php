@extends('layouts.master')

@section('title', 'Crear usuario')

@section('content')
  <h2>Lista de Usuarios</h2>

  <table class="table">
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
@endsection