<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$carrera = $_POST['carrera'];
$nro_modulo = $_POST['nro_modulo'];
$nom_mod = $_POST['nom_mod'];

$consulta = "UPDATE modulo_formativo SET id_carrera_profesional='$carrera', nro_modulo='$nro_modulo', nombre='$nom_mod' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../modulo_formativo.php'
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

