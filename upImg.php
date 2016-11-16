<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body>
		<script src = "js/jquery-3.1.0.js"></script>
		<script src = "js/geo/jquery.simpleWeather.min.js"></script>
		<?php
			session_start();
			$target_dir = "imagenes/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image

			echo "<br>--".basename( $_FILES["fileToUpload"]["name"])."--<br>";
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			$numerosCrudos = "123456789";
			$letrasCrudas = "qwertyuiopasdfghjklzxcvbnm";
			$mayusCrudas = strtoupper($letrasCrudas);
			$numeros = str_split($numerosCrudos);
			$letras = str_split($letrasCrudas);
			$mayus = str_split($mayusCrudas);
			$nombreNuevo = "";
			$contador = 0;

			for($contador = 0; $contador < 10; $contador++)
			{
				$opcion = rand(0, 2);

				switch ($opcion) {
					case 0:
					{
						$lim = sizeof($numeros) - 1;
						$nombreNuevo = $nombreNuevo.$numeros[rand(0, $lim)];
						break;
					}
					case 1:
					{
						$lim = sizeof($letras) - 1;
						$nombreNuevo = $nombreNuevo.$letras[rand(0, $lim)];
					}
					case 2:
					{
						$lim = sizeof($mayus) - 1;
						$nombreNuevo = $nombreNuevo.$mayus[rand(0, $lim)];
					}
				}
			}
			$partir = explode(".", basename($_FILES["fileToUpload"]["name"]));
			$extension = $partir[1];
			$directorio = 'imagenes/'.$nombreNuevo.".".$extension;
			$nombreNuevo = $nombreNuevo.".".$extension;

			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				//echo "<br>".$_FILES["fileToUpload"]["tmp_name"]."<br>";
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $directorio)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$conexion = mysqli_connect('localhost', 'root', '', 'tynod') or die('error');

			$sql = 'SELECT foto FROM '.$_SESSION['tipoUsuario'].' WHERE ID = '.$_SESSION['id'];

			echo $sql;
			$consulta = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
			$arregloConDatos = mysqli_fetch_array($consulta);
			echo "<br>}".$arregloConDatos[0]."<br>";
			/*
			if($arregloConDatos[0] != 'defaultUserLogo')
			{
				unlink('imagenes/'.$arregloConDatos[0]);
			}
*/
			$sql = 'UPDATE '.$_SESSION['tipoUsuario'].' SET foto = "'.$nombreNuevo.'" WHERE ID = '.$_SESSION['id'];
			
			mysqli_query($conexion, $sql);
			
			if(!mysqli_query($conexion, $sql))
			{
				echo mysqli_error($conexion);
			}
			else
			{
				
				if($_SESSION['tipoUsuario'] == "prestadores")
				{
					echo '<script> window.location = "perfilWrk.php" </script>';
				}
				else
				{
					echo '<script> window.location = "perfilUsr.php" </script>';
				}
			}
			
			
		?>

	</body>
</html>