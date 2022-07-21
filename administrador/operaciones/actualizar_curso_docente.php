<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$ud = $_POST['ud'];
$docente = $_POST['docente'];



$consulta = "UPDATE cursos_docentes SET id_unidad_didactica='$ud', id_docente='$docente' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../ProgramacionClases.php'
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

