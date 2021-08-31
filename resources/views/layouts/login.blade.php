<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyChan</title>
	<style type="text/css">
		.in {text-align: center; background-color: yellow; height: auto; box-sizing: border-box; vertical-align: center; padding: 20px; box-shadow: 10px 10px; }
		.in input { width: 200px;  padding: 10px; margin: 5px; text-align: center; }
		.in h4 { width: 100%;  padding: 10px; margin: 5px; text-align: center; }
		a { color: red; text-decoration: none; }
	</style>
</head>
<body style="background-color:black; color: black; font-family: Verdana;">
	@yield('form')
		@csrf
		<div class="in">
			<div>
				<input type="text" name="user" placeholder="Nombre" value="{{ old('user') }}">
				<input type="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
			</div>
			@yield('button')
			@yield('answer')
    	</div>
    </form>
</body>
</html>