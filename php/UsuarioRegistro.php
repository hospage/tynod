<html>
	<head></head>
		<body>
		
			<?php
			
				$Nombre = $_POST['Nombre'];
				$Apellido = $_POST['Apellido'];
				$Numero = $_POST['Numero'];
				$Edad = $_POST['Edad'];
				$Correo = $_POST['Correo'];
				$Contrasena = $_POST['Contrasena'];
				$Nacimiento = $_POST['Nacimiento'];
				
				$Conexion = mysqli_connect("localhost","root","","tynod");
				
				echo $Nombre;
				
				//mysqli_query($Conexion, "insert into usuarios (Nombre, Apellido, Edad, Correo, Contrasena, Nacimiento) values ($Nombre, $Apellidos, $Edad, $Correo, $Contrasena, $Nacimiento)") or die ("Hubo algun problema en el formulario");
				//echo "Registro exitoso";
				
				mysqli_close($Conexion);
			?>
		
		</body>
</html>