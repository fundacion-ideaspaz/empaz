@extends('layouts.master') @section('title', 'login') @section('content')

<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" id="slide1">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
  </div>
</div>
</section>
<section id="section02"></section>
@section('content')

<div class="container">
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
</div>
@endsection
