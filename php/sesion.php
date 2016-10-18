<?php

    $correo = $_POST['correo'];
	$contrasena = $_POST['psw'];
	$Ingreso = false;	
	
	$conexion = mysqli_connect("localhost","root","","tynod") or die("Problemas con la conexión");
	$consulta = mysqli_query($conexion,"select * from usuarios") or die("Problemas en el select:".mysqli_error($conexion));
	
	while ($registro=mysqli_fetch_array($consulta))
	{
		if ($registro['Correo'] == $correo)
		{
			if ($registro['Password'] == $contrasena)
			{
				$_SESSION['ID'] = $registro['ID'];
				$_SESSION['Nombre'] = $registro['Nombre'];
				$_SESSION['Correo'] = $registro['Correo'];	
				
				$Ingreso = true;
				
			}
		}
	}
	
	if ($Ingreso)
	{
		echo "Ingresado correctamente";
	}
	else
	{
		echo "Rectifique sus datos";
	}
?>