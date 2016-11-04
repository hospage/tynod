<?php
	session_start();
	echo $_SESSION['nombre'].",".$_SESSION['correo'].",".$_SESSION['id'];
?>