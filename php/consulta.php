<?php
	$datos = $_POST['datos'];
	$conexion = mysqli_connect('localhost', 'root', '', 'tynod');
	/*
	obtener($datos);
	
	function obtener($conjunto)
	{
		if(is_array($conjunto))
		{
			foreach ($conjunto as $nombre => $valor) {
				if(is_array($valor))
				{
					obtener($valor);
				}
				else
				{
					echo $valor;
				}
			}
		}
		else
		{
			echo $conjunto;
		}
	}

	function consulta($campo, $valor)
	{
		$sql = "SELECT $campo FROM $tipoUsuario WHERE "
	}*/

	$sql = '';

	if($datos['tipoVal'] == "numerico")
	{
		$sql = "SELECT ".$datos['select']." FROM ".$datos['tabla']." WHERE ".$datos['where']." = ".$datos['valor'];
	}
	else
	{
		$sql = "SELECT ".$datos['select']." FROM ".$datos['tabla']." WHERE ".$datos['where']." = \"".$datos['valor']."\"";
	}

	$consulta = mysqli_query($conexion, $sql);

	
	while($respuesta = mysqli_fetch_array($consulta))
	{
		echo $respuesta[$datos['select']];
	}
	
?>