<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$lug_fech_nomina = $_POST['lug_fech_nomina'];
$lug_fech_actas = $_POST['lug_fech_actas'];
$lug_fech_act_cons = $_POST['lug_fech_act_cons'];
$id_per_acad = $_POST['id_per_acad'];
$correlativo = $_POST['correlativo'];
$fecha = date("Y-m-d");


$consulta = "UPDATE presente_periodo_academico SET lug_fech_nominas='$lug_fech_nomina', lug_fech_actas='$lug_fech_actas', lug_fech_acta_cons='$lug_fech_act_cons', id_periodo_acad='$id_per_acad', nro_correleativo_matricula='$correlativo', fecha_modificacion='$fecha' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../PresentePeriodo.php'
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

