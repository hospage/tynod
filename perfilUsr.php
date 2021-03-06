<!DOCTYPE html>
<html>
	<?php
		session_start();
		if($_SESSION['tipoUsuario'] == "prestadores")
		{
			echo '<script>window.location = "perfilWrk.php" </script>';
		}
	?>
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
		<script src = "js/bootstrap.js" ></script>
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><i class = "fa fa-times"></i></button>
		      <h4 class="modal-title" class = "display-4">Cambio de foto de perfil</h4>
		    </div>
		    <div class="modal-body">
		      <div class = "muestraFoto">
		      	<img class = "imgNueva">
		      </div>
		      <form action="upImg.php" method="post" enctype="multipart/form-data">
				    Select image to upload:
				    <input type="file" name="fileToUpload" id="fileToUpload">
				    <input type="submit" value="Upload Image" name="submit">
				</form>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    </div>
		    </div>
		  </div>
		</div>
		</div>
		<div class = "barraMenu">
			<div class = "centro">
				<h4 class = "ftTynod"><img src="logos/LogoLlave.png" class = "imgLogo">TyNod</h4>
				<div class = "buscarPeque">
				<center>
				<button id = "btnBuscar"><i class = "fa fa-search"></i></button>
				</center>
				</div>
				<div class = "divBuscar">
					<form action = "busqueda.php" method = "post"><input type = "text" name = "buscar" class = "txtBuscar" > 
					<button type = "submit" class = "buscar"><i class = "fa fa-search"></i></button>
					</form>
				</div>
				<ul style = "float: right; color: black; margin-top: -30px; text-align: right; font-size: 30px;">
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class = "fa fa-cog" style = "color: #f2f2f2;"></i></a>
					    <ul class="dropdown-menu">
					        <li><a href="#" class = "rmLink" >Configuraci&oacute;n de la cuenta</a></li>
					        <li><a class = "rmLink" href="#" id = "linkSalir"> Salir </a></li>
					    </ul>

					</li>
				</ul>
				<div id = "divIcons">
				<a href = "mensajes.php" class = "rmLink mensajes"><i class = "fa fa-send"></i></a>
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
			<img src="logos/PortadaDefault.png" style="max-width: 100%; padding: 0; margin-top: -2px;">
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
				<div class = "portaBotones">	
					<button class = "btnModificar">
					<i class = "fa fa-pencil"></i> Modifica tu perfil
					</button>
					<button class = "btnSubirImg" data-toggle="modal" data-target="#myModal"><i class = "fa fa-picture-o"></i> Modifica tu foto</button>
				</div>
			</div>
		</div>
		<center>
			<div class = "divGN">
				<button class = "btnGuardar" id = "btnGuardar"><i class = "fa fa-save"></i> Guardar Cambios</button>
				<button class = "btnNoGuardar" id = "btnNoGuardar"><i class = "fa fa-reply-all"></i> Salir </button>
			</div>
		</center>
        
      </div>

		<div class = "centro" style = "padding: 0px;">
			<center>
			<?php
				$contador = 0;
				$vals = ['Descripci&oacute;n', 'Horarios'];
				$textareas = ['Desc', 'Horarios'];

				for($contador = 0; $contador < sizeof($vals); $contador++)
				{
					echo '<div class = "contenedorDatos"><p class = "ftTitulo2">'.$vals[$contador].'</p> <p id = "p'.$textareas[$contador].'" class = "pEdits"></p> <textarea class = "perfil" id = "txt'.$textareas[$contador].'"></textarea></div>';
				}
			?>
			</center>
		</div>

		<script>
			var tipoUsr = obtenerUsr();
			var isOpen = true;
			var btnShow = false;
			var muestraBtns = false;

			$(document).ready(function(){
				checaLocalizacion(cargaCaja);
				escondeCajaBuscar();
				escondeElementos(['tipoUsr', 'showUpBuscarC', 'muestraFoto', 'perfil', 'divGN']);
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
				window.location = 'perfilUsr.php';
			});

			$('#linkSalir').on('click', function(){
				$.get('php/terminate.php', function(){
					window.location = "index.php";
				})
			});

			$('.btnModificar').on('click', function(){
				muestraBtns = !muestraBtns;
				if(muestraBtns)
				{
					$('.divGN').fadeIn();
					$('.perfil').show();
					$('.pEdits').hide();
				}
				else
				{
					escondeEdits();
				}
			});

			$('#btnNoGuardar').on('click', function(){
				escondeEdits();
				muestraBtns = !muestraBtns;
			});

			$('#btnGuardar').on('click', function(){
				$.post('php/guardaData.php', {descripcion: $('#txtDesc').val(), horarios: $('#txtHorarios').val()}, function(callback){
					window.location = 'perfilUsr.php';
				})
			})

			/* codigo obtenido de jsfiddle */
		    $(":file").change(function () {
		        if (this.files && this.files[0]) {
		            var reader = new FileReader();
		            reader.onload = imageIsLoaded;
		            reader.readAsDataURL(this.files[0]);
		        }
		    });
			

			function imageIsLoaded(e) {
				$('.muestraFoto').show();
			    $('.imgNueva').attr('src', e.target.result);
			};

			/* fin de codigo recopilado */

			function escondeEdits()
			{
				$('.divGN').fadeOut();
				$('.perfil').hide();
				$('.pEdits').show();
			}

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
				$.post('php/obtenerDatos.php', function(callback){
					var datos = callback.split(",");
					$('#nombre').html(datos[0]);
					var paraImagen = {select: 'foto', tabla: datos[3], where: 'id', valor: datos[2], tipoVal: 'numerico'};
					$.post('php/consulta.php', {datos: paraImagen}, function(back){
						console.log(back);
						if(back != "defaultUserLogo.png")
						{
							$('.imgPerfil').attr('src', 'imagenes/'+back);
							alert('asdf');
						}
						
					});
					console.log(datos[3]);
					
					var txtDesc = {select: 'descripcion', tabla: datos[3], where: 'id', valor: datos[2], tipoVal: 'numerico'};
					
					$.post('php/consulta.php', {datos: txtDesc}, function(cback){
						$('#txtDesc').html(cback);
						
						$('#pDesc').html(cback);
					});

					var txtHorarios = {select: 'horarios', tabla: datos[3], where: 'id', valor: datos[2], tipoVal: 'numerico'};
					
					$.post('php/consulta.php', {datos: txtHorarios}, function(cback){
						$('#txtHorarios').html(cback);
						$('#pHorarios').html(cback);
					});
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