@extends('template.layout')

@section('title') Editar categoría | Panel de administración @endsection

@section('content')
	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-edit fa-fw"></i> Editar categoría
             {!! Form::model($categoria, ['route' => ['categorias.destroy', $categoria->id], 'method' => 'DELETE', 'role' => 'form', 'class' => 'pull-right']) !!}        
                {!! Form::button('<i class="fa fa-trash fa-fw"></i> ' . 'Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar categoría?")']) !!}
            {!! Form::close() !!}
            </h2>
            <ol class="breadcrumb">
                <li><i class="fa fa-bars fa-fw"></i> <a href="/">Inicio</a></li>
            	<li><a href="{{ route('categorias.index') }}">Categorías</a></li>
                <li class="active">Editar categoría</li>
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
        {!! Form::open(['route' => ['categorias.update', $categoria], 'method' => 'PUT']) !!}
            {!! Form::hidden('id_user', \Auth::user()->id) !!}
            {!! Form::label('nombre', 'Nombre') !!}
            <div class="row">
                <div class="col-md-10">
                    {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoría', 'autofocus']) !!}
                </div>
            </div>
            {!! Form::label('estado', 'Estado') !!}
            <div class="row">
                <div class="col-md-3">
                    {!! Form::select('estado', [
                    'activa' => 'Activa',
                    'inactiva' => 'Inactiva'], $categoria->estado, ['class' => 'form-control', 'placeholder' => 'Seleccionar estado']) !!}
                </div>
            </div>
            
            <br>   
            {!! Form::button('<i class="fa fa-refresh fa-fw"></i> Guardar cambios', ['type' => 'submit', 'class' => 'btn btn-warning']) !!} 
        {!! Form::close() !!}
    </ol>
@endsection