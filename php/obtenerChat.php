<?php
	$tabla = $_POST['tabla'];


	$conexion = mysqli_connect('localhost', 'root', '', 'tynod');

	$sql = "SELECT * FROM $tabla";
	$cons=  mysqli_query($conexion, $sql);
	$index = 0;
	$arrs = [];

	while($datos = mysqli_fetch_array($cons))
	{
		$arrs[$index] = $datos;


		$index++;
	}



    echo json_encode($arrs);

?>