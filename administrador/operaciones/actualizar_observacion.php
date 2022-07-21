<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$abrev = $_POST['abrev'];
$afecta = $_POST['afecta'];
$caracter = $_POST['caracter'];

$consulta = "UPDATE observacion SET descripcion='$descripcion', abreviatura='$abrev', afecta_ponderado='$afecta', caracter_si_cero='$caracter' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../observaciones.php'
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

