<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
                <img style="max-width:100px; margin-top: -10px;" src="{{ asset('imgs/foto.jpg') }}" alt="perfil" class="img-rounded" width="40">
            </a>
			<a class="navbar-brand" href="/">Almacén Enoba</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if (Auth::guest())
				@else
					@if(Auth::user()->role == 'administrador' || Auth::user()->role == 'avanzado')
						<li><a href="{{ route('admin.index') }}">Administración</a></li>
					@endif
				@endif
			</ul>

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li><a href="{{ route('login') }}">Iniciar sesión</a></li>
					<li><a href="{{ route('register') }}">Registrar</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/logout">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>