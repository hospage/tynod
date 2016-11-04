<?php
	session_start();
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
				$_SESSION['id'] = $registro['ID'];
				$_SESSION['nombre'] = $registro['Nombre'];
				$_SESSION['correo'] = $registro['Correo'];
				$_SESSION['tipoUsuario'] = 'usuarios';
				
				$Ingreso = true;
			}
		}
	}

	$ingresoTrabajador = false;

	$consulta = mysqli_query($conexion,"select * from prestadores");

	while ($registro=mysqli_fetch_array($consulta))
	{
		if ($registro['Correo'] == $correo)
		{
			if ($registro['Contrasena'] == $contrasena)
			{
				$_SESSION['id'] = $registro['ID'];
				$_SESSION['nombre'] = $registro['Nombre'];
				$_SESSION['correo'] = $registro['Correo'];
				$_SESSION['tipoUsuario'] = 'prestadores';
				
				$ingresoTrabajador = true;
			}
		}
	}

	
	if ($Ingreso || $ingresoTrabajador)
	{
		echo "y";
	}
	else
	{
		echo "n";
	}
?>