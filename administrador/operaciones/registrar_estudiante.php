<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$dni = $_POST['dni'];
$nom_ap = $_POST['nom_ap'];
$sexo = $_POST['sexo'];
$fecha_nac = $_POST['fecha_nac'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$anio_ingreso = $_POST['anio_ingreso'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$seccion = $_POST['seccion'];
$condicion = $_POST['condicion'];
$estado = $_POST['estado'];
$observacion = $_POST['observacion'];
$discapacidad = $_POST['discapacidad'];

//verificar si el docente ya esta registrado
	$busc_est_car = "SELECT * FROM estudiante WHERE dni='$dni' AND id_carrera='$carrera'";
	$ejec_busc_est_car = mysqli_query($conexion, $busc_est_car);
	$conteo = mysqli_num_rows($ejec_busc_est_car);
if ($conteo > 0) {
		echo "<script>
			alert('El estudiante, ya esta registrado paar esta carrera');
			window.history.back();
				</script>
			";
	}else{


	$insertar = "INSERT INTO estudiante (dni, apellidos_nombres, sexo, fecha_nac, direccion, telefono, anio_ingreso, id_carrera, id_semestre, seccion, condicion, estado, id_observacion, discapacidad) VALUES ('$dni','$nom_ap','$sexo', '$fecha_nac', '$direccion', '$telefono', '$anio_ingreso', '$carrera', '$semestre', '$seccion', '$condicion', '$estado', '$observacion', '$discapacidad')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
		//buscaremos el id del ultimo estudiante registrado para poder crear su usuario y contraseña
		$busc_ult_est = "SELECT * FROM estudiante WHERE dni='$dni' AND id_carrera='$carrera'";
		$ejec_busc_ult_est = mysqli_query($conexion, $busc_ult_est);
		$res_busc_ult_est = mysqli_fetch_array($ejec_busc_ult_est);
		$id_ult_est = $res_busc_ult_est['id'];;
		$crear_user = "INSERT INTO usuario_estudiante (id_estudiante, usuario, password) VALUES ('$id_ult_est', '$dni', '$dni')";
		$ejec_crear_user = mysqli_query($conexion, $crear_user);
		if ($ejec_crear_user) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../estudiante.php'
    			</script>";
		}else{
			echo "<script>
			alert('Error al Registrar usuario, por favor contacte al administrador');
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