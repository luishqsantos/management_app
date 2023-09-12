<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Página não encontrada</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

	<!-- Font Awesome Icon -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/fallback-style.css')}}" />
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Ops! Nada foi encontrado</h2>
			<p>A página que você está procurando pode ter sido removida, ter seu nome alterado ou estar temporariamente indisponível. <a href="{{route(Auth::check() ? 'app.home' : 'site.index')}}">Retornar à página inicial</a></p>
		</div>
	</div>

</body>

</html>