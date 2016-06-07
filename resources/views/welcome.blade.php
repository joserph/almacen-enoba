@extends('template.layout')

@section('title', 'Almacén Enoba') 

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>Enoba Sistemas, C.A.</h1>
            <p>Welcome to Almacén Enoba by <strong><a href="http://twitter.com/joserph_a" target="_blanck">@joserph_a</a></strong></p>            
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="panel panel-primary">
      			<a href="{{ route('almacenes.index') }}">
	        		<div class="panel-heading">
	          			<h3 class="panel-title text-center"><i class="fa fa-building fa-5x"></i></h3>
	        		</div>
	        		<div class="panel-body text-center">
	          			Almacenes
	        		</div>
      			</a>
    		</div>
  		</div>
  		<div class="col-md-6">
    		<div class="panel panel-primary">
      			<a href="{{ route('categorias.index') }}">
	        		<div class="panel-heading">
	          			<h3 class="panel-title text-center"><i class="fa fa-bars fa-5x"></i></h3>
	        		</div>
	        		<div class="panel-body text-center">
	          			Categorías
	        		</div>
      			</a>
    		</div>
  		</div>
  		<div class="col-md-6">
    		<div class="panel panel-primary">
      			<a href="{{ route('subcategorias.index') }}">
	        		<div class="panel-heading">
	          			<h3 class="panel-title text-center"><i class="fa fa-sort-amount-desc fa-5x"></i></h3>
	        		</div>
	        		<div class="panel-body text-center">
	          			Subcategorías
	        		</div>
      			</a>
    		</div>
  		</div>
  		<div class="col-md-6">
    		<div class="panel panel-primary">
      			<a href="{{ route('productos.index') }}">
	        		<div class="panel-heading">
	          			<h3 class="panel-title text-center"><i class="fa fa-shopping-cart fa-5x"></i></h3>
	        		</div>
	        		<div class="panel-body text-center">
	          			Productos
	        		</div>
      			</a>
    		</div>
  		</div>
    </div>

@endsection