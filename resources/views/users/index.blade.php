@extends('layouts.master') @section('title', 'Panel de Usuarios') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Usuarios</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Empresa</th>
            <th>Email</th>
            <th width="20%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <p></p>
          <tr>
            <td>{{$user->nombre}}</td>
            <td>{{$user->role}}</td>
            <td>
              @if($user->empresa) {{$user->empresa->nombre}} @endif
            </td>
            <td>{{$user->email}}</td>
            <td width="20%">
              <a class="btn btn-sm btn-primary" href="/users/{{$user->id}}/edit" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-danger" href="/users/{{$user->id}}/delete" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <div class="btn-group" role="group">
          <button id="createButtonsGroup" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Crear nuevo usuario
          </button>
          <div class="dropdown-menu" aria-labelledby="createButtonsGroup">
            <a href="/users/new/superadmin" class="dropdown-item">SuperAdmin</a>
            <a href="/users/new/experto" class="dropdown-item">Experto</a>
            <a href="/users/new/empresa" class="dropdown-item">Empresa</a>
            <a href="/users/new/consulta" class="dropdown-item">Consulta</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection