<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'conexionBD/conexion.php';
	$id2 = $_POST['id2'];
	$user = $_POST['txt2user'];
	$pass = $_POST['txt2pass'];
	$name = $_POST['txt2name'];
	$email = $_POST['txt2email'];
	$select = $_POST['txt2select'];

	$sentencia = $bd->prepare("UPDATE usuarios SET user = ?, pass = ?, nombre_completo = ?, email = ?, tipo_user = ? WHERE id_usuario = ?;");
	$resultado = $sentencia->execute([$user,$pass,$name,$email,$select, $id2 ]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error no se ingreso correctamente los datos";
	}
?>