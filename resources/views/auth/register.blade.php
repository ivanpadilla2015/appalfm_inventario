<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Inventario Equipos Alfm |</title>
    
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

</head>

<body class="login">
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
			{!! BootForm::open(['url' => url('/register'), 'method' => 'post']) !!}
			
			<h1>Crear una Cuenta</h1>

			{!! BootForm::text('name', 'Nombre', old('name'), ['placeholder' => 'Full Name']) !!}

			{!! BootForm::email('email', 'Correo', old('email'), ['placeholder' => 'Email']) !!}

			{!! BootForm::text('telefono', 'Telfono', old('telefono'), ['placeholder' => 'Telefono']) !!}

			{!! BootForm::password('password', 'Contraseña', ['placeholder' => 'Password']) !!}

			{!! BootForm::password('password_confirmation', 'Confirmar Contraseña', ['placeholder' => 'Confirmation']) !!}
		
			{!! BootForm::submit('Registrar', ['class' => 'btn btn-default']) !!}
		   
			<div class="clearfix"></div>
			
			<div class="separator">
				<p class="change_link">Ya eres usuario ?
					<a href="{{ url('/login') }}" class="to_register"> Iniciar Sesión </a>
				</p>
				
				<div class="clearfix"></div>
				<br />
				
				<div>
					<h1><i class="fa fa-paw"></i> Inventario Equipos!</h1>
					<p>©2017 Todos los derechos reservados. Equipos Alfm ! Privacidad y términos</p>
				</div>
			</div>
			{!! BootForm::close() !!}
        </section>
    </div>
</div>
</body>
</html>