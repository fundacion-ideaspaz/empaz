@extends('layouts.master') @section('title', 'Panel de Cuestionarios Resueltos') @section('content')
<div class="row">
    <div class="col-12 card">
        <div class="card-body">
            <h2>Lista de Cuestionarios</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>            
                        <th width="25%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuestionarios_result as $cuestionario_result)
                    <tr>
                        <td class="nombre-column">
                            {{$cuestionario_result->cuestionario_id}}
                        </td>
                        <td width="25%">
                            <a class="btn btn-sm btn-primary" href="/reportes/{{$cuestionario_result->cuestionario_id}}" data-toggle="tooltip" data-placement="bottom" title="Reporte"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          </td>
                    </tr>



                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
