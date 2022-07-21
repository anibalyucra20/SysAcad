<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$periodo = $_POST['per_acad'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$fecha_calificaciones = $_POST['fecha_calificaciones'];
$fechapp = strtotime($fecha_fin);
$dia_fin = date("d", $fechapp);
$messs = date("m", $fechapp);
switch ($messs) {
	case '1':
		$mes_fin = "Enero";
		break;
	case '2':
		$mes_fin = "Febrero";
		break;
	case '3':
		$mes_fin = "Marzo";
		break;
	case '4':
		$mes_fin = "Abril";
		break;
	case '5':
		$mes_fin = "Mayo";
		break;
	case '6':
		$mes_fin = "Junio";
		break;
	case '7':
		$mes_fin = "Julio";
		break;
	case '8':
		$mes_fin = "Agosto";
		break;
	case '9':
		$mes_fin = "Septiembre";
		break;
	case '10':
		$mes_fin = "Octubre";
		break;
	case '11':
		$mes_fin = "Noviembre";
		break;
	default:
		$mes_fin = "Diciembre";
		break;
}

$anio_fin = date("Y", $fechapp);

$fecha_hoy = date("Y-m-d");


	$insertar = "INSERT INTO periodo_academico (periodo, fecha_inicio, fecha_fin, fecha_cierre_notas) VALUES ('$periodo','$fecha_inicio','$fecha_fin', '$fecha_calificaciones')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
		//buscaremos el id del ultimo periodo creado para asignar al ultimo periodo y las fechas para impresión de nominas
		$busc_ult_periodo = "SELECT * FROM periodo_academico WHERE periodo='$periodo'";
		$ejec_busc_ult_per = mysqli_query($conexion, $busc_ult_periodo);
		$res_busc_ult_per = mysqli_fetch_array($ejec_busc_ult_per);
		$id_ult_periodo = $res_busc_ult_per['id'];
		//generamos el lugar y fecha para las nominas para ello buscamos el distrito de la institucion.
		$busc_dist = "SELECT * FROM datos_institucion WHERE id=1";
		$ejec_busc_dist = mysqli_query($conexion, $busc_dist);
		$res_busc_dist = mysqli_fetch_array($ejec_busc_dist);
		$dist_institucion = $res_busc_dist['distrito'];
		//ahora concatenamos
		$lug_fech = $dist_institucion.", ".$dia_fin." de ".$mes_fin." del ".$anio_fin;
		//ahora que ya tenemos el id del ultimo periodo  podremos actualizar el registro del periodo actual.

		$update_per_act = "UPDATE presente_periodo_academico SET lug_fech_nominas='$lug_fech', lug_fech_actas='$lug_fech', lug_fech_acta_cons='$lug_fech', id_periodo_acad='$id_ult_periodo', nro_correleativo_matricula='1', fecha_modificacion='$fecha_hoy'";
		$ejec_upd_per_act = mysqli_query($conexion, $update_per_act);
		if ($ejec_upd_per_act) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../PeriodoAcademico.php'
    			</script>";
		}else{
			echo "<script>
			alert('Error al Actualizar periodo actual, por favor contacte al administrador');
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






mysqli_close($conexion);

?>