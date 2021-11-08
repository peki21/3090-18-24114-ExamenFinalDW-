<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'conexionBD/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id_usuario = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Usuario</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Usuario:</h3>
		<form method="POST" action="modificarusuario.php">
			<table>
				<tr>
					<td>Usuario </td>
					<td><input type="text" name="txt2user" value="<?php echo $persona->user; ?>"></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input type="txt" name="txt2pass" value="<?php echo $persona->pass; ?>"></td>
				</tr>
				<tr>
					<td>Nombre Completo: </td>
					<td><input type="text" name="txt2name" value="<?php echo $persona->nombre_completo; ?>"></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type="emails" name="txt2email" value="<?php echo $persona->email; ?>"></td>
				</tr>
				<tr>
					<td>Tipo de Usuario: </td>


				<td>
				<select name="txt2select" value="<?php echo 	$persona->tipo_user; ?>">
				<option>ADMINISTRADOR</option>
				<option>USUARIO</option>
				<option>MEDICO</option>
				<option>ENFERMERO</option>
				<option>SECRETARIA</option>
				</select>
				</td>


				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_usuario; ?>">
					<td colspan="2"><input type="submit" value="EDITAR USUARIO"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>