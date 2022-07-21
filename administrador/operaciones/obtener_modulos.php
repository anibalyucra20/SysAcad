<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');


$id_carrera = $_POST['id_carrera'];


	$consulta = "SELECT * FROM modulo_formativo WHERE id_carrera_profesional = '$id_carrera' ORDER BY id";
	$ejec_cons = mysqli_query($conexion, $consulta);

		$cadena = '<option></option>';
		while ($mostrar=mysqli_fetch_array($ejec_cons)) {
			$cadena=$cadena.'<option value='.$mostrar['id'].'>'.$mostrar['nro_modulo'].'</option>';
		}
		echo $cadena;

?>