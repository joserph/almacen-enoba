@extends('template.layout')

@section('title') Productos | Panel de administración @endsection

@section('content')
	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <i class="fa fa-shopping-cart fa-fw"></i> Productos 
                <a href="{{ route('productos.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i> Agregar</a>
            </h2>
            <ol class="breadcrumb">
                <li><i class="fa fa-bars fa-fw"></i> <a href="/">Inicio</a></li>
                <li class="active">Lista de productos</li>
            </ol>
        </div>
    </div>
    @include('flash::message')
	<!-- .table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>                
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th> 
                <th class="text-center">Subcategoría</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Almacen</th> 
                <th class="text-center">Usuario</th>  
                <th class="text-center">Acción</th>              
            </tr>
            @foreach($productos as $item) 
            <tr>
                <td class="text-center">{{ $contador+=1 }} </td>
                <td class="text-center">{{ $item->nombre }}</td>
                <td class="text-center">{{ $item->sub->nombre }}</td>
                <td class="text-center">{{ $item->sub->id_categoria }}</td>
                <td class="text-center">{{ $item->nombre }}</td>
                <td class="text-center">{{ $item->user->name }}</td>
                <td class="text-center">
                    <a href="{{ route('productos.edit', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i> Editar</a>
                </td>
            </tr>          
            @endforeach            
        </table>
    </div>
    <!-- /.table -->
@endsection