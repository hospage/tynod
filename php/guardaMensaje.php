<?php
	session_start();
	$mensaje = $_POST['mensaje'];
	$usuario1 = $_POST['idUsuario'];
	$usuario2 = $_POST['idPrestador'];
	$nombreTabla = "t".$usuario1.$usuario2;

	$conexion = mysqli_connect('localhost', 'root', '', 'tynod');
	$sql = "CREATE TABLE IF NOT EXISTS $nombreTabla (envio varchar(5), mensaje varchar(255), orden INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(orden))";
	if(!mysqli_query($conexion, $sql))
	{
		echo mysqli_error($conexion);
	}

	$j = "";

	if($_SESSION['tipoUsuario'] == "prestadores")
	{
		$j = "p";
	}	
	else
	{
		$j = "u";
	}

	$envio = $_SESSION['id'].$j;

	$sql = "INSERT INTO $nombreTabla (envio, mensaje) VALUES (\"$envio\", \"$mensaje\")";
	mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

	$sql = "SELECT idUsuario FROM tablas WHERE idPrestador = \"$usuario2\"";
	$consulta = mysqli_query($conexion, $sql);

	if(!mysqli_fetch_array($consulta))
	{
		$sql = "INSERT INTO tablas (idUsuario, idPrestador) VALUES ($usuario1, $usuario2)";
		mysqli_query($conexion, $sql) or die (mysqli_error($conexion));
	}

	mysqli_close($conexion);
?>