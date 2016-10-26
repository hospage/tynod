<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/perfil.css">
		<link rel="stylesheet" type="text/css" href="css/generalTynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body style = "background-color: #d9d9d9;">
		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>
		<div class = "barraMenu">
			<div class = "centro">
				<h4 class = "ftTynod"><img src="logos/LogoLlave.png" class = "imgLogo">TyNod</h4>
				<div class = "miniBuscar">
				<center>
				<button id = "btnBuscar"><i class = "fa fa-search"></i></button>
				</center>
				</div>
				<div class = "divBuscar">
					<input type = "text" class = "txtBuscar" > 
					<a class = "rmLink buscar" href = "#"><i class = "fa fa-search"></i></a>
				</div>
				

				<div id = "divIcons">
					<a href = "#" class = "rmLink"><i class = "fa fa-home"></i></a>
					&nbsp;
					<a href = "#" class = "rmLink"><i class = "fa fa-cog"></i></a>
				</div>
			</div>
		</div>
		<div class = "centro" style = "padding: 0px;">
			<div class = "divFondo">
				<div id = "divImg"><img src = "logos/defaultUserLogo.png" class = "imgPerfil" alt = "imagen del usuario"/></div>
				<div class = "divEstrellas">
					<i class = "fa fa-star fa-2x" id = "estrella5"></i>
					<i class = "fa fa-star fa-2x" id = "estrella4"></i>
					<i class = "fa fa-star fa-2x" id = "estrella3"></i>
					<i class = "fa fa-star fa-2x" id = "estrella2"></i>
					<i class = "fa fa-star fa-2x" id = "estrella1"></i>
				</div>
			</div>
		</div>
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
			$(document).ready(function(){
				checaLocalizacion(cargaCaja);
				escondeCajaBuscar();
			});

			$(window).resize(function(){

				escondeCajaBuscar();
			});

			function escondeCajaBuscar()
			{
				if($(window).width() < 600)
				{
					$('.divBuscar').hide();
					$('#btnBuscar').show();
				}
				else
				{
					$('.divBuscar').show();
					$('#btnBuscar').hide();
				}
			}


			var cargaCaja = function(weather){
				var cadena = "Buscar profesionistas en " + weather.city + ", " + weather.region + ", " + weather.country;
				$('.txtBuscar').attr('placeholder', cadena);
			};

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