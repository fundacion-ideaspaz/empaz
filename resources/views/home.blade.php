@extends('layouts.masterhomelogin') @section('title', 'login') @section('content')
@endsection

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->role === 'superadmin')
                        <a href="/users" class="btn btn-primary">Users List</a>
                        <a href="/dimensiones" class="btn btn-primary">Dimensiones List</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> -->

