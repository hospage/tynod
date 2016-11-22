<?php
	$mensaje = $_POST['mensaje'];
	$usuario1 = $_POST['idUsuario'];
	$usuario2 = $_POST['idPrestador'];
	$nombreTabla = "t".$usuario1.$usuario2;

	$conexion = mysqli_connect('localhost', 'root', '', 'tynod');
	$sql = "CREATE TABLE IF NOT EXISTS $nombreTabla (mensaje varchar(255), orden INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(orden))";
	if(!mysqli_query($conexion, $sql))
	{
		echo mysqli_error($conexion);
	}

	$sql = "INSERT INTO $nombreTabla (mensaje) VALUES (\"$mensaje\")";
	mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
	$sql = "INSERT INTO tablas (idUsuario, idPrestador) VALUES ($usuario1, $usuario2)";
	mysqli_query($conexion, $sql) or die (mysqli_error($conexion));
	mysqli_close($conexion);
?>