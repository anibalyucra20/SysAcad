<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

//buscar periodo actual
$busc_per_ac= "SELECT * FROM presente_periodo_academico ORDER BY id LIMIT 1";
$e_b_per_ac = mysqli_query($conexion, $busc_per_ac);
$res_b_per_ac = mysqli_fetch_array($e_b_per_ac);
$id_periodo_actual = $res_b_per_ac['id_periodo_acad'];

$ud = $_POST['ud'];
$docente = $_POST['docente'];
$cantidad = 3;

// buscamos la unidad didactica en el periodo actual, para evitar hacer doble registro de unidad didactica en el periodo academico actual
	$busc_ud_per = "SELECT * FROM cursos_docentes WHERE id_unidad_didactica='$ud' AND id_periodo_acad='$id_periodo_actual'";
	$ejec_busc_ud_per = mysqli_query($conexion, $busc_ud_per);
	$conteo = mysqli_num_rows($ejec_busc_ud_per);
if ($conteo > 0) {
	echo "<script>
			alert('La unidad didáctica seleccionada ya está registrado para este Periodo Acádemico');
			window.history.back();
				</script>
			";
}else{

	$insertar = "INSERT INTO cursos_docentes (id_unidad_didactica, id_docente, id_periodo_acad, cant_calificaciones) VALUES ('$ud','$docente','$id_periodo_actual','$cantidad')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../ProgramacionClases.php'
    			</script>";
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