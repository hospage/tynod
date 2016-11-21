<?php
	session_start();
	$descripcion = $_POST['descripcion'];
	$horarios = $_POST['horarios'];

	$conexion = mysqli_connect('localhost', 'root', '', 'tynod');

	$sql = 'UPDATE '.$_SESSION['tipoUsuario'].' SET descripcion = "'.$descripcion.'" WHERE ID = '.$_SESSION['id'];
	mysqli_query($conexion, $sql);
	$sql = 'UPDATE '.$_SESSION['tipoUsuario'].' SET horarios = "'.$horarios.'" WHERE ID = '.$_SESSION['id'];
	mysqli_query($conexion, $sql);

	mysqli_close($conexion);
	
?>