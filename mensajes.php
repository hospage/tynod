<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/booty.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/perfil.css">
		<link rel="stylesheet" type="text/css" href="css/generalTynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/mensajes.css">
		<link rel="stylesheet" type="text/css" href="css/busqueda.css">
	</head>
	<?php
		session_start();
		$nombrez = $_SESSION['nombre'];
		$idz = $_SESSION['id'];
		echo "<script> var nombre = \"$nombrez\"; var id = $idz </script>";

	?>
	<body style = "background-color: #d9d9d9;">
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><i class = "fa fa-times"></i></button>
		      <h4 class="modal-title" class = "display-4">Enviar mensaje a </h4>
		    </div>
		    <div class="modal-body">
		    	<textarea class = "form-control" id = "mensaje"></textarea>
		    	<button type = "button" class = "btn btn-default" id = "btnMandar" style = "margin-top: 15px"> Enviar <i class = "fa fa-send"></i> </button>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    </div>
		    </div>
		  </div>
		</div>
		<p class = "tipoUsr"></p>
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><i class = "fa fa-times"></i></button>
		    </div>
		    <div class="modal-body">
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    </div>
		    </div>
		  </div>
		</div>
		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>
		<script src = "js/bootstrap.js" ></script>
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
		<nav class = "personas">
		<h3> Contactos </h3>
		<?php
			$conexion = mysqli_connect('localhost', 'root', '', 'tynod');

			$contra = "";
			$real = "";
			$tipoUsr = "";

			if($_SESSION['tipoUsuario'] == "prestadores")
			{
				$contra = "idUsuario";
				$real = "idPrestador";
				$tipoUsr = "usuarios";
			}
			else
			{
				$contra = "idPrestador";
				$real = "idUsuario";
				$tipoUsr = "prestadores";
			}

			$sql = "";

			$sql = "SELECT $contra FROM tablas WHERE $real = ".$_SESSION['id'];

			/*

			if($real = "idUsuario")
			{
				$sql = "SELECT idPrestador FROM tablas WHERE idUsuario = ".$_SESSION['id'];
			}
			else
			{
				$sql = "SELECT idUsuario FROM tablas WHERE idPrestador = ".$_SESSION['id'];
			}
			*/
			$consulta = mysqli_query($conexion, $sql);

			echo '<script type="text/javascript"> var persos = []; var pizeroni = []; </script>';

			$ued = "";

			if($_SESSION['tipoUsuario'] == "prestador")
			{
				$ued = "p";
			}
			else
			{
				$ued=  "u";
			}

			
			while($datos1 = mysqli_fetch_array($consulta))
			{
				$id = $datos1[$contra];
				$sql = "SELECT * FROM $tipoUsr WHERE ID = $id";
				$consulta1 = mysqli_query($conexion, $sql);
				while($datos2 = mysqli_fetch_array($consulta1))
				{
					$nombre = $datos2['Nombre'];
					$foto = "imagenes/".$datos2['foto'];
					echo '<script type="text/javascript"> persos.push("t'.$_SESSION['id'].$id.'"); </script>';
					echo '<div class = "ctContacto" id = "p'.$id.'"> <img class = "trabajador" src = "'.$foto.'"> <p class = "nombre">'.$nombre.' </p> </div>';
					echo '<script type="text/javascript">pizeroni.push('.$id.');</script>';

				} 
			}



			mysqli_close($conexion);
		?>
		</nav>
		<div class = "burritos"></div>
		<script>
			var tipoUsr = obtenerUsr();
			var isOpen = true;
			var btnShow = false;
			var muestraBtns = false;
			var idSender = -1;
			var activo = -1;

			$(document).ready(function(){
				checaLocalizacion(cargaCaja);
				escondeCajaBuscar();
				escondeElementos(['tipoUsr', 'showUpBuscarC', 'muestraFoto', 'perfil', 'divGN']);
				tipoUsr = $('.tipoUsr').html();
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

			$('.ctContacto').click(function(event){
				var idAlertada = event.target.id[1];
				$('#myModal').modal('show');
				cargaChat(idAlertada);
			});	

			function cargaChat(pishi)
			{
				var index= 0;

				if(pishi != activo)
				{

				$('.burritos').html("");

				console.log(pizeroni);
				console.log(id);
				console.log(persos);

				for(index=  0; index < persos.length; index++)
				{
					if(pizeroni[index] == pishi)
					{
						console.log('nyes');
						$.post('php/obtenerChat.php', {tabla: persos[index]}, function(callback){
						var callback = JSON.parse(callback);
							for(index2 = 0; index2 < callback.length; index2++)
							{
								//console.log("index "+pizeroni[index]);

								var mamamia = callback[index2][0];

								if(mamamia.includes("u"))
								{
									$('.burritos').append('<div class = "mensaje1">'+callback[index2]["mensaje"]+'</div><br>');
								}
								else
								{
									$('.burritos').append('<div class = "mensaje2">'+callback[index2]["mensaje"]+'</div><br>');
								}
							}
							
						});
					}
				}
			}
				activo = pishi;
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