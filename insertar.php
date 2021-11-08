<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$user = $_POST['txtuser'];
	$pass = $_POST['txtpass'];
	$name = $_POST['txtName'];
	$email = $_POST['txtemail'];
	$select = $_POST['txtselect'];

	$sentencia = $bd->prepare("INSERT INTO usuarios(user,pass,nombre_completo,email,tipo_user) VALUES (?,?,?,?,?);");
	$resultado = $sentencia->execute([$user,$pass,$name,$email,$select]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>