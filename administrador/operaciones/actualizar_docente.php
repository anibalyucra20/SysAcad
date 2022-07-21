<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id = $_POST['id'];
$dni_anterior = $_POST['dni_a'];
$dni = $_POST['dni'];
$ap_nom = $_POST['ap_nom'];
$cond_laboral = $_POST['cond_laboral'];
$fecha_nac = $_POST['fecha_nac'];
$niv_form = $_POST['niv_form'];
$seg_espec = $_POST['seg_espec'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];

//verificar si se cambio dni de docente
//si se cambió dni tendremos que validar que el dni no exista
if ($dni_anterior != $dni) {
	//verificar si el docente ya esta registrado
	$busc_ult_docente = "SELECT * FROM docentes WHERE dni='$dni'";
	$ejec_busc_ult_doc = mysqli_query($conexion, $busc_ult_docente);
	$conteo = mysqli_num_rows($ejec_busc_ult_doc);
	if ($conteo > 0) {
		echo "<script>
			alert('El docente ya está registrado en el Sistema');
			window.history.back();
				</script>
			";
	}else{

		$consulta = "UPDATE docentes SET dni='$dni', apellidos_nombre='$ap_nom', cond_laboral=		'$cond_laboral', fecha_nac='$fecha_nac', nivel_educacion='$niv_form', 		2da_especialidad='$seg_espec', telefono='$telefono', correo='$email', id_cargo='$		cargo' WHERE id=$id";
		$ejec_consulta = mysqli_query($conexion, $consulta);
		if ($ejec_consulta) {
			echo "<script>
					alert('Registro Actualizado de manera Correcta');
					window.location= '../docente.php'
				</script>
			";
		}else {
			echo "<script>
					alert('Error al Actualizar Registro, por favor contacte con el 		administrador');
					window.history.back();
				</script>
			";
		}

	}
}else{



$consulta = "UPDATE docentes SET dni='$dni', apellidos_nombre='$ap_nom', cond_laboral='$cond_laboral', fecha_nac='$fecha_nac', nivel_educacion='$niv_form', 2da_especialidad='$seg_espec', telefono='$telefono', correo='$email', id_cargo='$cargo' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			alert('Registro Actualizado de manera Correcta');
			window.location= '../docente.php'
		</script>
	";
}else {
	echo "<script>
			alert('Error al Actualizar Registro, por favor contacte con el administrador');
			window.history.back();
		</script>
	";
}



}

mysqli_close($conexion);


?>

