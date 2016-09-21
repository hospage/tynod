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
				<div class = "centro">
					<div><h3 style = "float: left; position: absolute;"> <i class = "fa fa-wrench"></i>  TyNod </h3> <a href="#" style = "float: right;" class = "ingreso"> INGRESA </a></div>
					<?php espacios(7); ?>
					<div id = "poster1"><h1>Anuncia tus servicios totalmente gratis. </h1></div> 

					<div id = "well-regis">
							<div id = "regis"><h3><a href="#" class = "linkeroni"> Regs&iacute;trate Gratis </a></h3></div>

							<?php espacios(2); ?>

							<h5> TyNod cuenta con una opci&oacute;n totalmente gratis para todo tipo de usuarios, ya seas prestador de servicios/empresa o un usuario</h5>
					</div>


				</div>
			</div>
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
	</body>
</html>