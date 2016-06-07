@extends('template.layout')

@section('title') Editar producto | Panel de administración @endsection

@section('content')
	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-edit fa-fw"></i> Editar producto
            {!! Form::model($producto, ['route' => ['productos.destroy', $producto->id], 'method' => 'DELETE', 'role' => 'form', 'class' => 'pull-right']) !!}        
                {!! Form::button('<i class="fa fa-trash fa-fw"></i> ' . 'Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar producto?")']) !!}
            {!! Form::close() !!} 
            </h2>
            <ol class="breadcrumb">
                <li><i class="fa fa-bars fa-fw"></i> <a href="/">Inicio</a></li>
            	<li><a href="{{ route('productos.index') }}">Productos</a></li>
                <li class="active">Editar producto</li>
            </ol>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i class="fa fa-exclamation-triangle fa-fw"></i></strong> Por favor corrige los siguentes errores:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <ol class="breadcrumb">
        <!-- Form -->
        {!! Form::open(['route' => ['productos.update', $producto], 'method' => 'PUT']) !!}
            {!! Form::hidden('id_user', \Auth::user()->id) !!}
            {!! Form::label('nombre', 'Nombre') !!}
            <div class="row">
                <div class="col-md-10">
                    {!! Form::text('nombre', $producto->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del producto', 'autofocus']) !!}
                </div>
            </div>
            {!! Form::label('id_subcateg', 'Subcategoría') !!}
            <div class="row">
                <div class="col-md-4">
                    {!! Form::select('id_subcateg', $subcat, $producto->id_subcateg, ['class' => 'form-control select-category', 'required', 'placeholder' => 'Seleccione Subcategoría']) !!}
                </div>
            </div>
            {!! Form::label('almacenes', 'Tags') !!}
             <div class="row">
                <div class="col-md-4">                    
                    {!! Form::select('almacenes[]', $almacenes, $misAlmacenes, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
                </div>
            </div>
            
            <br>   
            {!! Form::button('<i class="fa fa-refresh fa-fw"></i> Guardar cambios', ['type' => 'submit', 'class' => 'btn btn-warning']) !!} 
        {!! Form::close() !!}
    </ol>
@endsection