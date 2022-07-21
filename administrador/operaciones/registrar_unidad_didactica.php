<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$ud = $_POST['ud'];
$carrera = $_POST['carrera_m'];
$modulo = $_POST['modulo'];
$semestre = $_POST['semestre'];
$creditos = $_POST['creditos'];
$horas = $_POST['horas'];
$curricular = $_POST['curricular'];

//consulta para poder generar el orden de la ud en el semestre
$consul = "SELECT * FROM unidades_didacticas WHERE id_semestre='$semestre' AND id_modulo='$modulo' AND id_carrera='$carrera'";
$ejec_consl = mysqli_query($conexion, $consul);
$conteo = mysqli_num_rows($ejec_consl);
$orden =$conteo+1;


	$insertar = "INSERT INTO unidades_didacticas (unidad_didactica, id_modulo, id_carrera, id_semestre, creditos, horas, curricular, orden) VALUES ('$ud','$modulo','$carrera','$semestre','$creditos','$horas','$curricular','$orden')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../unidad_didactica.php'
    			</script>";
	}else{
		echo "<script>
			alert('Error al registrar, por favor verifique sus datos');
			window.history.back();
				</script>
			";
	};






mysqli_close($conexion);

?>