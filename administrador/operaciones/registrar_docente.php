<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$dni = $_POST['dni'];
$nom_ap = $_POST['nom_ap'];
$cond_laboral = $_POST['cond_laboral'];
$fecha_nac = $_POST['fecha_nac'];
$niv_formacion = $_POST['niv_formacion'];
$seg_especialidad = $_POST['seg_especialidad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];

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


	$insertar = "INSERT INTO docentes (dni, apellidos_nombre, cond_laboral, fecha_nac, nivel_educacion, 2da_especialidad, telefono, correo, id_cargo) VALUES ('$dni','$nom_ap','$cond_laboral', '$fecha_nac', '$niv_formacion', '$seg_especialidad', '$telefono', '$email', '$cargo')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
		//buscaremos el id del ultimo docente registrado para poder crear su usuario y contraseña
		$busc_ult_docente = "SELECT * FROM docentes WHERE dni='$dni'";
		$ejec_busc_ult_doc = mysqli_query($conexion, $busc_ult_docente);
		$res_busc_ult_doc = mysqli_fetch_array($ejec_busc_ult_doc);
		$id_ult_doc = $res_busc_ult_doc['id'];;
		$crear_user = "INSERT INTO usuario_docente (id_docente, usuario, password) VALUES ('$id_ult_doc', '$dni', '$dni')";
		$ejec_crear_user = mysqli_query($conexion, $crear_user);
		if ($ejec_crear_user) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../docente.php'
    			</script>";
		}else{
			echo "<script>
			alert('Error al Registrar Usuario, por favor contacte al administrador');
			window.history.back();
				</script>
			";
		}
			
	}else{
		echo "<script>
			alert('Error al registrar, por favor verifique sus datos');
			window.history.back();
				</script>
			";
	};

};




mysqli_close($conexion);

?>