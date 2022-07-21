<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$ud = $_POST['ud'];
$carrera = $_POST['carrera_m'];
$modulo = $_POST['modulo'];
$semestre = $_POST['semestre'];
$creditos = $_POST['creditos'];
$horas = $_POST['horas'];
$curricular = $_POST['curricular'];

$consulta = "UPDATE unidades_didacticas SET unidad_didactica='$ud', id_modulo='$modulo', id_carrera='$carrera', id_semestre='$semestre', creditos='$creditos', horas='$horas', curricular='$curricular' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../unidad_didactica.php'
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

