<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyChan</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/common.css') }}">
</head>
<body style="color: black; background: white;">
	
	<div class="flex padding-20">
		<div class="padding-10 margin-5 flex-box flex" style="background: rgba(0, 0, 0, 0.1);">
			<div>
				<p style="text-align: center; color: gray">¿Ya estás registrado?</p>
				<h1 style="text-align: center; padding-bottom: 20px;">Iniciar sesión</h1>
			</div>
			<form action="{{ URL::asset('sign-in') }}" method="post" class="flex" style="padding: 20px">
				@csrf
				<div class="flex-item button-sign">
					<div>
						<div class="flex padding-10">
							<input type="text" name="user" placeholder="Nombre" value="{{ old('user') }}">
						</div>
						<div class="flex padding-10">
							<input type="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
						</div>
					</div>
					<div class="flex">
						<div>
							<input type="submit" name="submit"  value="Iniciar sesión">
						</div>
					</div>
		    	</div>
		    </form>
		</div>
	</div>
	<div class="flex padding-20">
		<div class="padding-10 margin-5 flex-box flex" id="sign-up" style="background: rgba(0, 0, 0, 0.1);">
			
			<h1 style="text-align: center; padding: 20px;">Registrarse</h1>
			
			<form action="{{ URL::asset('sign-up') }}" method="post" class="flex" style="padding: 20px">
				@csrf
				<div class="flex-item">
					<div>
						<div class="flex padding-10">
							<input type="text" name="user" placeholder="Nombre" value="{{ old('user') }}">
						</div>
						<div class="flex padding-10">
							<input type="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
						</div>
					</div>
					<div class="flex padding-10">
						<div>
							<input type="submit" name="submit" value="Registrarse">
						</div>
					</div>
		    	</div>
		    </form>
		</div>
	</div>
</body>
</html>