<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/tynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	<title> Bienvenido a TyNod </title>
	</head>
	<body>
		<div class="popup" data-popup="popup-1">
		    <div class="popup-inner">
		    <div id = "divEscoge">

		         <h3>Eres un:</h3>
		         <center>
		         <div class = "trabajador"> <a href = "#" class = "rmLink"><h4> Trabajador <i class = "fa fa-suitcase"></i> </h4> </a> </div> 
		         <div class = "usuario"> <a href = "#" class = "rmLink"><h4> Usuario <i class = "fa fa-user"></i> </h4> </a> </div> 
		         </center>
		    </div>
		    <div id = "divRegistro"> 
				<form action = "inicio.php" method = "post">
				Nombre:
				<input type = "text" name = "Nombre" class = "inputTextPopup"><br><br>
				Numero Telefonico:
				<input type = "text" name = "Numero" placeholder="Opcional" class = "inputTextPopup"><br><br>
				Correo:
				<input type = "text" name = "Correo" class = "inputTextPopup"><br><br>
				Edad: 
				<input type = "text" name = "Edad" class = "inputTextPopup"><br><br>
				Contrase&ntilde;a:
				<input type = "password" name = "Contrasena"  class = "inputTextPopup" id = "txtContra1"> <div class = "dot" id = "dot1"> <i class = "fa fa-circle"></i> </div><br><br> 
				Confirmar Contrase&ntilde;a:
				<input type = "password" name = "Contrasena"  class = "inputTextPopup" id = "txtContra2"> <div class = "dot" id = "dot2"> <i class = "fa fa-circle"></i> </div> <br><br>
				Ciudad: <div style = "display: inline-block;" id = "localizacion"> </div> <br><br>
				Fecha de Nacimiento:
                <input type="date" name="bday" max="2016-12-31"  class = "inputTextPopup"><br><br>
				
				<button type = "input" class = "btnGeneral" name = "btnRegistro"> Reg&iacute;strate </button>
				</form>
			</div>
		        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
		    </div>
		</div>

		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>
		<div id = "container-fluid">
			<div id = "inicio">
			<div id = "registro"></div>
				<div class = "centro">
					<div><h3 style = "float: left; position: absolute;"> <img src="logos/LogoLlave.png" style = "width: 40px;">  TyNod </h3> <a href="#" style = "float: right;" class = "ingreso"> INGRESA </a></div>
					<?php espacios(7); ?>
					<div id = "poster1"><h1>Ofrece tus servicios totalmente gratis. </h1></div>

					<div id = "well-regis">
						<div id = "regis"><h3><a href="#" class = "linkeroni" data-popup-open="popup-1"> Reg&iacute;strate Gratis </a></h3></div>

						<?php espacios(2); ?>

						<h5> TyNod cuenta con una opci&oacute;n totalmente gratis para todo tipo de personas, ya sea prestador de servicios/empresa o un usuario.</h5>
					</div>
					
					<div> 
						<img src="logos/LogoGorila.png" class = "gorila">
					</div>

				</div>
			</div>
			<div id = "ques">
				<div class = "centro">
					<div class = "titulo2"> &#191;Qu&eacute; es TyNod?</div>
					<h4 style = "text-align: justify;"> Tynod es una plataforma para que prestadores de servicios y empresas se publiquen para que sean contactados por los usuarios en caso de necesitar una soluci&oacute;n que pueda ser brindada por estos.
				</div>
			</div>
			<div id = "usarTyn">
				<div class = "centro">
					<div class = "titulo2">&#191;Por qu&eacute; usar TyNod? </div>
					<center>
					<div class = "well-perks">
						<i class = "fa fa-smile-o fa-3x ico" style = "color: #80ff80;"></i> <h5> La satisfacci&oacute;n de los usuarios es una prioridad enorme </h5>
					</div>
					<div class = "well-perks">
						<i class = "fa fa-bolt fa-3x ico" style = "color: #ffff66;"></i> <h5> Encontrar&aacute;s los servicios que necesitas r&aacute;pidamente</h5>
					</div>
					<div class = "well-perks">
						<i class = "fa fa-globe fa-3x ico" style = "color: #0047b3;"></i> <h5> Encuentra siempre lo que necesitas sin importar d&oacute;nde est&eacute;s </h5>
					</div>
					</center>
					
					<div> 
						<img src="logos/LogoLlave.png" class = "llave">
					</div>
					
				</div>
				
			</div>
			<div style = "background-color: #66b5ff; margin-top: -55px;"><center> Hecha con <i class = "fa fa-heart" style = "color:red;"></i></center></div>
		</div>
		<?php

			function espacios($veces)
			{
				$contador = 0;

				for($contador = 0; $contador < $veces; $contador++)
				{
					echo "<br>";
				}
			}

		?>
		<script type="text/javascript">
			var unit = 'c';


			$(document).ready(function(){
				$('#divRegistro').hide();
				$('.dot').hide();
				checkWeather();
			});

			 $('[data-popup-open]').on('click', function(e)  {
		        var targeted_popup_class = jQuery(this).attr('data-popup-open');
		        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
		 
		        e.preventDefault();
		    });
		 
		    //----- CLOSE
		    $('[data-popup-close]').on('click', function(e)  {
		        var targeted_popup_class = jQuery(this).attr('data-popup-close');
		        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
		 
		        e.preventDefault();

		        $('#divEscoge').show();
				$('#divRegistro').hide();
				
				$('.inputTextPopup').val("");
		    });


			$('#regis').on('click', function(){
				$('.linkeroni').blur();
				var html = '<div class = "divRegistro"> HEY </div>';

			});

			$('.usuario').on('click', function(){
				$('#divEscoge').hide();
				$('#divRegistro').fadeIn(500);
			});

			$('#txtContra1').keyup(function(){

				setTimeout(function() {
                   var contra = $('#txtContra1').val();
                   checaValor(contra);
               }, 0);

			});

			$('#txtContra2').keyup(function(){

				setTimeout(function() {
                   var contra1 = $('#txtContra1').val();
                   var contra2 = $('#txtContra2').val();
                   checaIguales(contra1, contra2);
               }, 0);

			});

			function checaValor(contrasena)
			{
				var html = '';
				if(contrasena.length <= 7)
				{
					html += '<i class = "fa fa-circle" style = "color: #ff3333;"></i> La contrase&ntilde;a debe de tener 8 caracteres o mas';
				}
				else
				{
					html += '<i class = "fa fa-circle" style = "color: #33cc33;"></i> Perfecta!';
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
				if(password1 != password2)
				{
					html += '<i class = "fa fa-circle" style = "color: #ff3333;"></i> Las contrase&ntilde;as no coinciden';
				}
				else
				{
					html += '';
				}


				$('#dot2').html(html);
				$('#dot2').show();
			}

			function loadWeather(location, woeid) {
				$.simpleWeather({
					location: location,
					woeid: woeid,
					unit: 'c',
					success: function(weather) {
						
						$('#localizacion').html(weather.city + ", " + weather.region + ", " + weather.country);
						
					},
					error: function(error) {
						$("#weather-info").html('<p>'+error+'</p>');
					}
				});
			}


			function checkWeather()
			{
				if(navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(position) {
						loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
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
				
				$Nombre = $_REQUEST['Nombre'];
				$Numero = $_REQUEST['Numero'];
				$Correo = $_REQUEST['Correo'];
				$Nacimiento = $_REQUEST['bday'];
				$Edad = $_REQUEST['Edad'];
				$Pass = $_REQUEST['Contrasena'];
				$Region = "America";
				$Pais = "Mexico";
				$Conexion = mysqli_connect("localhost","root","","tynod");
				
				$ID1 = mysqli_query($Conexion, "select count(ID) as ID from usuarios");
					
				$NumeroID = mysqli_fetch_array($ID1);				

				
				$ID = $NumeroID['ID'] + 1;
				
				
				$regis = mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais, Edad) values ('$Nombre', '$Nacimiento', '$Numero', '$Correo', '$ID', '$Pass','$Region','$Pais', '$Edad')");
					
				if(!$regis)
				{
					mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais, Edad) values ('$Nombre', '$Nacimiento', 0000, '$Correo', '$ID', '$Pass','$Region','$Pais', '$Edad')");
					echo mysqli_error($Conexion);
				}
				
				
				
	
				mysqli_close($Conexion);
				
			}
			
		
		?>
</html>

