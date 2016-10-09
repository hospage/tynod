<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/tynod.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body>

		<script src = "js/jquery-3.1.0.js"></script>
		<div id = "container-fluid">
			<div id = "inicio">
			<div id = "registro"></div>
				<div class = "centro">
					<div><h3 style = "float: left; position: absolute;"> <i class = "fa fa-wrench"></i>  TyNod </h3> <a href="#" style = "float: right;" class = "ingreso"> INGRESA </a></div>
					<?php espacios(7); ?>
					<div id = "poster1"><h1>Ofrece tus servicios totalmente gratis. </h1></div>

					<div id = "well-regis">
							<div id = "regis"><h3><a href="Registro.php" class = "linkeroni"> Reg&iacute;strate Gratis </a></h3></div>

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
			$('#regis').on('click', function(){
				$('.linkeroni').blur();
				var html = '<div class = "divRegistro"> HEY </div>';
				$('#registro').html(html);

			});
		</script>
	</body>
</html>
