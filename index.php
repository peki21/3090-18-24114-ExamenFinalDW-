<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'conexionBD/conexion.php';
		$sentencia = $bd->query("SELECT * FROM usuarios;");
		$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Formulario-ejercicio1 </title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<a href="cerrar.php">Cerrar Sesión</a>
		<h3>Lista de Usuarios</h3>
		<table>
			<tr>
				<td>Id_User</td>
				<td>Nombre de Usuario</td>
				<td>Password</td>
				<td>Nombre Completo</td>
				<td>Correo Electronico</td>
				<td>Tipo de Usuario</td>
			
			</tr>

			<?php 
				foreach ($usuario as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_usuario; ?></td>
						<td><?php echo $dato->user; ?></td>
						<td><?php echo $dato->pass; ?></td>
						<td><?php echo $dato->nombre_completo; ?></td>
						<td><?php echo $dato->email; ?></td>
						<td><?php echo $dato->tipo_user; ?></td>
					
					
						<td><a href="modificar.php?id=<?php echo $dato->id_usuario; ?>">Modificar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_usuario; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

		<!-- inicio insert -->
		<hr>
		<h3>Ingresar Usuario:</h3>
		<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>Nombre usuario: </td>
					<td><input type="text" name="txtuser"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="txtpass"></td>
				</tr>
				<tr>
					<td>Nombre Completo: </td>
					<td><input type="text" name="txtName"></td>
				</tr>
				<tr>
					<td>Correo Electronico: </td>
					<td><input type="email" name="txtemail"></td>
				</tr>

			<tr>
				<td>Tipo de Usuario</td>
				<td>
				<select name="txtselect">
				<option>ADMINISTRADOR</option>
				<option>USUARIO</option>
				<option>MEDICO</option>
				<option>ENFERMERO</option>
				<option>SECRETARIA</option>
				</select>
				</td>
				</tr>
			


				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR USUARIO"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>