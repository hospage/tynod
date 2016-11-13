<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/booty.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/perfil.css">
		<link rel="stylesheet" type="text/css" href="css/generalTynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body style = "background-color: #d9d9d9;">
		
		<p class = "tipoUsr"></p>
		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>
		<div class = "barraMenu">
			<div class = "centro">
				<h4 class = "ftTynod"><img src="logos/LogoLlave.png" class = "imgLogo">TyNod</h4>
				<div class = "buscarPeque">
				<center>
				<button id = "btnBuscar"><i class = "fa fa-search"></i></button>
				</center>
				</div>
				<div class = "divBuscar">
					<input type = "text" class = "txtBuscar" > 
					<a class = "rmLink buscar" href = "#"><i class = "fa fa-search"></i></a>
				</div>
				<ul style = "float: right; color: black; margin-top: -30px; text-align: right; font-size: 30px;">
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class = "fa fa-cog" style = "color: #f2f2f2;"></i></a>
					    <ul class="dropdown-menu ">
					        <li><a href="#" class = "rmLink" >Configuraci&oacute;n de la cuenta</a></li>
					        <li><a class = "rmLink" href="#" id = "linkSalir"> Salir </a></li>
					    </ul>
					</li>
				</ul>
				<div id = "divIcons">
					<a href = "#" class = "rmLink" id = "linkHome"><i class = "fa fa-home"></i></a>
				</div>
			</div>
		</div>
		<div class = "showUpBuscarC">
			<div class = "centro" style = "padding: 5px;">
				<i class = "fa fa-search"></i><input type = "text" class = "txtShowUp">
			</div>
		</div>
		<div class = "centro" style = "padding: 0px;">
			<div class = "divFondo">
				<div id = "divImg"><img src = "logos/defaultUserLogo.png" class = "imgPerfil" alt = "imagen del usuario"/></div>
				<p class = "ftNombre" id = "nombre"></p>
				<div class = "divEstrellas">
					<i class = "fa fa-star fa-2x" id = "estrella5"></i>
					<i class = "fa fa-star fa-2x" id = "estrella4"></i>
					<i class = "fa fa-star fa-2x" id = "estrella3"></i>
					<i class = "fa fa-star fa-2x" id = "estrella2"></i>
					<i class = "fa fa-star fa-2x" id = "estrella1"></i>
				</div>
			</div>
		</div>
		<center>
			<button class = "btnModificar">
				<a href = "#" class = "rmLink"><i class = "fa fa-pencil"></i> Modifica tu perfil </a>
			</button>
			<button class = "btnSubirImg"><i class = "fa fa-picture-o"></i> Modifica tu foto </button>
		</center>
		<div class = "centro" style = "padding: 0px;">
			<center>
			<?php
				$contador = 1;
				$vals = ['Descripci&oacute;n', 'Horarios'];

				foreach ($vals as $valor) 
				{
					echo '<div class = "contenedorDatos"><p class = "ftTitulo2">'.$valor.'</div>';
				}
			?>
			</center>
		</div>

		<script>
			var tipoUsr = obtenerUsr();
			var isOpen = true;
			var btnShow = false;

			$(document).ready(function(){
				checaLocalizacion(cargaCaja);
				escondeCajaBuscar();
				escondeElementos(['tipoUsr', 'showUpBuscarC']);
				tipoUsr = $('.tipoUsr').html();
				cargaDatosUsuario();
			});

			$(window).resize(function(){
				escondeCajaBuscar();
			});

			$('#btnBuscar').on('click', function(){
				btnShow = !btnShow;

				if(btnShow)
				{
					$('.showUpBuscarC').show();
				}
				else
				{
					$('.showUpBuscarC').hide();
				}
				
				console.log(tipoUsr);
			});

			$('#linkHome').on('click', function(){
				window.location = 'perfilWrk.php';
			})

			$('.dropdown').on('click', function(){
				if(isOpen)
				{
					$('.dropdown').addClass('open');
				}
				else
				{
					$('.dropdown').removeClass('open');
				}

				isOpen = !isOpen;
			});

			$('#linkSalir').on('click', function(){
				$.get('php/terminate.php', function(){
					window.location = "index.php";
				})
			});

			function escondeCajaBuscar()
			{
				var anchoVentana = $(window).width();

				if(anchoVentana < 600)
				{
					$('.divBuscar').hide();
					$('.buscarPeque').show();
				}
				else
				{
					$('.divBuscar').show();
					$('.buscarPeque').hide();
					$('.showUpBuscarC').hide();
				}

				if(anchoVentana < 1080)
				{
					$('.contenedorDatos').css('width', '1000px');
				}
				else
				{
					$('.contenedorDatos').css('width', '650px');
				}
			}

			
			var cargaCaja = function(weather){
				var cadena = "Buscar profesionistas en " + weather.city + ", " + weather.region + ", " + weather.country;
				$('.txtBuscar').attr('placeholder', cadena);
			};

			function cargaDatosUsuario()
			{
				$.post('php/obtenerDatos.php', {var: 'foo'}, function(callback){
					var datos = callback.split(",");
					$('#nombre').html(datos[0]);
					
				});
			}

			function obtenerUsr()
			{
				$.post('php/obtenerTipoUsr.php', {var: 'foo'}, function(callback){
					$('.tipoUsr').html(callback);
				});

				return $('.tipoUsr').html();
			}

			function escondeElementos(elementos)
			{
				elementos.forEach(function(elemento){
					$('.'+elemento).hide();
				});
			}

			function cargaLocalizacion(location, funcion) {
				$.simpleWeather({
					location: location,
					woeid: undefined,
					unit: 'c',
					success: function(weather) {
						funcion(weather);
						
					},
					error: function(error) {
						$("#weather-info").html('<p>'+error+'</p>');
					}
				});
			}

			function checaLocalizacion(funcion)
			{
				if(navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(position) {
						cargaLocalizacion(position.coords.latitude+','+position.coords.longitude, funcion); //load weather using your lat/lng coordinates
					});
				}
				else
				{
					$('#weather-info').html('Sorry, geolocation is not supported by your web browser :-(');
				}
			}
		</script>

	</body>
</html>