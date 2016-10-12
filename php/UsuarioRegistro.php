<html>
	<head></head>
		<body>
		
			<?php
			
				$Nombre = $_POST['Nombre'];
				$Numero = $_POST['Numero'];
				$Correo = $_POST['Correo'];
				$Nacimiento = $_POST['bday'];
				$Pass = "Default";
				$Region = "America";
				$Pais = "Mexico";
				$Conexion = mysqli_connect("localhost","root","","tynod");
				
				$ID1 = mysqli_query($Conexion, "select count(ID) as ID from usuarios");
					
				$NumeroID = mysqli_fetch_array($ID1);
				
				$ID = $NumeroID['ID'] + 1;
				
				if(!mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais) values ('$Nombre', '$Nacimiento', '$Numero', '$Correo', '$ID', '$Pass','$Region','$Pais')"))
				{
					mysqli_query($Conexion, "insert into usuarios (Nombre, Nacimiento, Telefono, Correo, ID, Password, Region, Pais) values ('$Nombre', '$Nacimiento', 0000, '$Correo', '$ID', '$Pass','$Region','$Pais')");
				}
				
				echo "Registro exitoso";

				mysqli_close($Conexion);
			?>
		
		</body>
</html>