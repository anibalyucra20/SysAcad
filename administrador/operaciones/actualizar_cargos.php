<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$cargo = $_POST['cargo'];

$consulta = "UPDATE cargos SET cargo='$cargo' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../cargos.php'
		</script>
	";
}else {
	echo "<script>
			alert('Error al Actualizar Registro, por favor contacte con el administrador');
			window.history.back();
		</script>
	";
}




mysqli_close($conexion);


?>

