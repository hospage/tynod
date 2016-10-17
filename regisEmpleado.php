<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/registraEmpleado.css">
		<link rel="stylesheet" type="text/css" href="css/generalTynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body>
		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>

		<div class = "barraTynod">
			<div class = "centro">
				 <h3 class = "ftTitulo"> <img src="logos/LogoLlave.png" class = "imgLogo" /> Tynod </h3>
			</div>
		</div>
		<div class = "centro">
			<form action="regisEmpleado.php" method="POST">
				<div class = "tituloRegistro"> <h2 class = "ftTitulo"> Registro de Datos </h2> </div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Nombre: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "Nombre" class = "txtIngreso" id = "caja1">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Apellido: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "Apellido" class = "txtIngreso" id = "caja2">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Profesi&oacute;n: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "Profesion" class = "txtIngreso" id = "caja3">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> RFC: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "RFC" class = "txtIngreso" id = "caja4">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Contrase&ntilde;a </p> 
					</div>
					<div class = "caja">
						<input type = "password" name = "Contrasena1" class = "txtIngreso" id = "txtContra1"> <div class = "dot" id = "dot1"> </div>
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Confirmar Contrase&ntilde;a </p> 
					</div>
					<div class = "caja">
						<input type = "password" name = "Contrasena2" class = "txtIngreso" id = "txtContra2"> <div class = "dot" id = "dot2"> </div>
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> C&oacute;digo Postal: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "CP" class = "txtIngreso" id = "caja5">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Direcci&oacute;n: </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "Direccion" class = "txtIngreso" id = "caja6">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> N&uacute;mero de Telefono </p> 
					</div>
					<div class = "caja">
						<input type = "text" name = "Numero" class = "txtIngreso" id = "caja7">
					</div>
				</div>
				<div class = "entrada">
					<div class = "dato">
						<p class = "ftDato"> Localidad: </p> 
					</div>
					<div class = "caja">
						<div id = "localizacion"> </div>
					</div>
				</div>
				<div class ="dato"><div class = "boton"></div> </div>
			</form>
		</div>
		<script>
			$(document).ready(function(){

				checaLocalizacion();

			});

			$('#txtContra1').keyup(function(){

				setTimeout(function() {
                   var contra = $('#txtContra1').val();
                   checaValor(contra);
                   if($('#txtContra1').val() == "")
					{
						$('#dot1').html("");
					}
               }, 0);

			});

			$('#txtContra2').keyup(function(){

				setTimeout(function() {
                   var contra1 = $('#txtContra1').val();
                   var contra2 = $('#txtContra2').val();
                   checaIguales(contra1, contra2);
               }, 0);

			});

			$('.txtIngreso').keyup(function(){

				setTimeout(function() {
					console.log($('.txtIngreso').val());

					
					if(todosTienenValor() && $('#txtContra1').val() == $('#txtContra2').val())
					{
						$('.boton').html('<button type = "input" class = "btnRegistro" name = "btnRegistro"> Reg&iacute;strate </button>')
					}
					
               }, 0);

			});

			function todosTienenValor()
			{
				var todosTienen = true;
				var contador = 1;

				for(contador = 1; contador <= 7; contador++)
				{
					if($('#caja'+contador).val() == "")
					{
						todosTienen = false;
					}
				}

				if(todosTienen)
				{
					return true;
				}
				else
				{
					return false;
				}
			}

			function checaValor(contrasena)
			{
				var html = '';
				var tieneValor = false;

				if(contrasena.length <= 7)
				{
					html += '<i class = "fa fa-circle" style = "color: #ff3333;"></i> La contrase&ntilde;a debe de tener 8 caracteres o mas';
				}
				else
				{
					html += '<i class = "fa fa-circle" style = "color: #33cc33;"></i> Perfecta!';
					tieneValor = true;
				}

				if(contrasena == "")
				{
					$('#dot2').html("");
				}

				$('#dot1').html(html);
				$('#dot1').show();
			}

			function checaIguales(password1, password2)
			{
				var html = '';
				var son = false;

				if(password1 != password2)
				{
					html += '<i class = "fa fa-circle" style = "color: #ff3333;"></i> Las contrase&ntilde;as no coinciden';
				}
				else
				{
					html += '';
					son = true;
				}


				$('#dot2').html(html);
				$('#dot2').show();

				return son;
			}

			function cargaLocalizacion(location, woeid) {
				$.simpleWeather({
					location: location,
					woeid: woeid,
					unit: 'c',
					success: function(weather) {
						
						$('#localizacion').html('<p class = "ftDato">' + weather.city + ", " + weather.region + ", " + weather.country + '</p>');

						var localizacion = [weather.city, weather.region, weather.country];

						localizacion.forEach(function(element, index, array){
							$('#localizacion').append('<input type = "hidden" name = "localizacion['+index+']" value = "'+element+'">');
						});
						
					},
					error: function(error) {
						$("#weather-info").html('<p>'+error+'</p>');
					}
				});
			}

			function checaLocalizacion()
			{
				if(navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(position) {
						cargaLocalizacion(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
					});
				}
				else
				{
					$('#weather-info').html('Sorry, geolocation is not supported by your web browser :-(');
				}
			}
		</script>
	</body>
		<?php
			
			if (isset($_REQUEST['btnRegistro']))
			{
				
				$nombre = $_REQUEST['Nombre'];
				$apellido = $_REQUEST['Apellido'];
				$profesion = $_REQUEST['Profesion'];
				$rfc = $_REQUEST['RFC'];
				$pass = $_REQUEST['Contrasena1'];
				$cp = $_REQUEST['CP'];
				$direccion = $_REQUEST['Direccion'];
				$numero = $_REQUEST['Numero'];
				$localizacion = $_REQUEST['localizacion'];
				$disponibilidad = "---";
				
				$localizacion = $_REQUEST['localizacion'];
				$ciudad = $localizacion[0];
				$region = $localizacion[1];
				$pais = $localizacion[2];
				
				$Conexion = mysqli_connect("localhost","root","","tynod");
				
				$ID1 = mysqli_query($Conexion, "select count(ID) as ID from prestadores");
					
				$NumeroID = mysqli_fetch_array($ID1);				

				
				$ID = $NumeroID['ID'] + 1;
				
				
				
				mysqli_query($Conexion, "insert into prestadores (ID, Profesion, Nombre, Apellido, RFC, CP,Direccion, Region, Pais, Celular, Disponibilidad, Ciudad) values ('$ID', '$profesion', '$nombre', '$apellido', '$rfc', '$cp', '$direccion', '$region','$pais','$numero', '$disponibilidad', '$ciudad')");
				echo mysqli_error($Conexion);
					
				
				mysqli_close($Conexion);
			}
			
		?>
</html>