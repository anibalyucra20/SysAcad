<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$per_acad = $_POST['per_acad'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$fecha_notas = $_POST['fecha_notas'];

$consulta = "UPDATE periodo_academico SET periodo='$per_acad', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', fecha_cierre_notas='$fecha_notas' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../PeriodoAcademico.php'
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

