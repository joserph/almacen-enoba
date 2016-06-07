@extends('template.layout')

@section('title') Editar almacén | Panel de administración @endsection

@section('content')
	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-edit fa-fw"></i> Editar almacén           
            {!! Form::model($almacen, ['route' => ['almacenes.destroy', $almacen->id], 'method' => 'DELETE', 'role' => 'form', 'class' => 'pull-right']) !!}        
                {!! Form::button('<i class="fa fa-trash fa-fw"></i> ' . 'Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar almacén?")']) !!}
            {!! Form::close() !!}           
            </h2>
            <ol class="breadcrumb">
                <li><i class="fa fa-bars fa-fw"></i> <a href="/">Inicio</a></li>
            	<li><a href="{{ route('almacenes.index') }}">Almacenes</a></li>
                <li class="active">Editar almacén</li>
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
        {!! Form::open(['route' => ['almacenes.update', $almacen], 'method' => 'PUT']) !!}
            {!! Form::hidden('id_user', \Auth::user()->id) !!}
            {!! Form::label('nombre', 'Nombre') !!}
            <div class="row">
                <div class="col-md-10">
                    {!! Form::text('nombre', $almacen->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del almacén', 'autofocus']) !!}
                </div>
            </div>
            
            <br>   
            {!! Form::button('<i class="fa fa-refresh fa-fw"></i> Guardar cambios', ['type' => 'submit', 'class' => 'btn btn-warning']) !!} 
        {!! Form::close() !!}
    </ol>
@endsection