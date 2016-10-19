<?php
	$Nombre = $_REQUEST['Nombre'];
	$Numero = $_REQUEST['Numero'];
	$Correo = $_REQUEST['Correo'];
	$Nacimiento = $_REQUEST['bday'];
	$Edad = $_REQUEST['Edad'];
	$Pass = $_REQUEST['Contrasena'];
	$localizacion = $_REQUEST['localizacion'];


	$ciudad = $localizacion[0];
	$Region = $localizacion[1];
	$Pais = $localizacion[2];
	
	$Conexion = mysqli_connect("localhost","root","","tynod");
	
	$ID1 = mysqli_query($Conexion, "select count(ID) as ID from usuarios");
		
	$NumeroID = mysqli_fetch_array($ID1);				

	
	$ID = $NumeroID['ID'] + 1;
	
	$Uso = false;
	
	$Mostrar = mysqli_query($Conexion, "select Correo from usuarios");
	while ($MostrarDatos = mysqli_fetch_array($Mostrar))
	{
		
		if ($MostrarDatos['Correo'] == $Correo)
		{
			$Uso = true;
		}				
	}
	
	if ($Uso)
		{
			echo "cnv";
		}
	else
		{
			$regis = mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais, Edad, Ciudad) values ('$Nombre', '$Nacimiento', '$Numero', '$Correo', '$ID', '$Pass','$Region','$Pais', '$Edad', '$ciudad')");
		
			if(!$regis)
			{
				mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais, Edad, Ciudad) values ('$Nombre', '$Nacimiento', 0000, '$Correo', '$ID', '$Pass','$Region','$Pais', '$Edad', '$ciudad')");
				echo mysqli_error($Conexion);
			}
		}
		
	mysqli_close($Conexion);
?>