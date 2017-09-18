@extends('layouts.master') @section('title', 'Panel de Usuarios') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Usuarios</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>role</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <p></p>
          <tr>
            <td>{{$user->nombre}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->correo}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
          <div class="btn-group" role="group">
              <button id="createButtonsGroup" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </button>
              <div class="dropdown-menu" aria-labelledby="createButtonsGroup">
                <a href="/users/new" class="dropdown-item">Create user</a>
                <a href="#" class="dropdown-item">Dropdown link</a>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection