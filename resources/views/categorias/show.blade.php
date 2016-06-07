@extends('template.layout')

@section ('title') Categoría {{ $categoria->nombre }} | Panel de administración @endsection

@section ('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <i class="fa fa-bars fa-fw"></i> Categoría {{ $categoria->nombre }}</h2>
            <ol class="breadcrumb">
                <li><i class="fa fa-bars fa-fw"></i> <a href="/">Inicio</a></li>
                <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
                <li class="active">Categoría {{ $categoria->nombre }}</li>
            </ol>
        </div>
    </div>
    @include('flash::message')
    <div class="table-responsive">
      <table class="table table-bordered table-responsive">
          <tr>
              <td class="active text-center"><strong>Nombre de categoría</strong></td>                    
          </tr>
           <tr>
              <td class="text-center text-capitalize warning">{{ $categoria->nombre }}</td>                    
          </tr>
      </table>
    </div>
    <a href="{{ route('categorias.edit', $categoria->id) }}" class="col-xs-6 col-sm-6 btn btn-warning"><i class="fa fa-edit fa-fw"></i> Editar categoría</a>
    <br>
    <hr>
    <!-- Large modal -->
    <!-- Button trigger modal -->
    
    <button class="col-xs-6 col-sm-6 btn btn-success" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top" title="Agregar factura, nota de crédito o nota de débito">
    <i class="fa fa-plus-circle fa-fw"></i>  Agregar subcategoría
    </button>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h3 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Agregar subcategoría</h3>
                </div>
                <div class="modal-body">
                    @include('subcategorias.create')
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Large modal -->
    @if($subCount > 0)
    <br><br>
    <legend><h3><i class="fa fa-sort-amount-desc fa-fw"></i> Subcategorías de {{ $categoria->nombre }}</h3></legend>
    <!-- .table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>                
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th>  
                <th class="text-center">Estado</th>          
                <th class="text-center">Usuario</th>  
                <th class="text-center">Acción</th>              
            </tr>
            @foreach($subs as $item) 
            <tr>
                <td class="text-center">{{ $contador+=1 }} </td>
                <td class="text-center">{{ $item->nombre }}</td>
                <td class="text-center">{{ $item->estado }}</td>
                <td class="text-center">{{ $item->user->name }}</td>
                <td class="text-center">
                    <a href="{{ route('subcategorias.edit', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i> Editar</a>
                </td>
            </tr>          
            @endforeach            
        </table>
    </div>
    <!-- /.table -->
    @endif 
    @section('scripts')
        <script src="{{ asset('js/myScript.js') }}"></script>
    @endsection
@stop
