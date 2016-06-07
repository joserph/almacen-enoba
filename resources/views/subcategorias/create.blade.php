<div class="error"></div>
{!! Form::open(['route' => 'subcategorias.store', 'class' => 'add-sub']) !!}
    {!! Form::hidden('id_user', Auth::user()->id) !!}
    {!! Form::hidden('id_categoria', $categoria->id) !!}
	{!! Form::label('nombre', 'Nombre') !!}
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la subcategoría', 'autofocus']) !!}
		</div>
	</div>
	{!! Form::label('estado', 'Estado') !!}
    <div class="row">
        <div class="col-md-3">
            {!! Form::select('estado', [
            'activa' => 'Activa',
            'inactiva' => 'Inactiva'], null, ['class' => 'form-control', 'placeholder' => 'Seleccionar estado']) !!}
        </div>
    </div><br>

	<button tipe="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Agregar</button>
{!! Form::close() !!}