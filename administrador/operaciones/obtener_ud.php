<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id_carrera = $_POST['carr'];
$id_semestre = $_POST['sem'];


	$consulta = "SELECT * FROM unidades_didacticas WHERE id_carrera = '$id_carrera' AND id_semestre= '$id_semestre' ORDER BY id";
	$ejec_cons = mysqli_query($conexion, $consulta);

		$cadena = '<option></option>';
		while ($mostrar=mysqli_fetch_array($ejec_cons)) {
			$cadena=$cadena.'<option value='.$mostrar['id'].'>'.$mostrar['unidad_didactica'].'</option>';
		}
		echo $cadena;

?>