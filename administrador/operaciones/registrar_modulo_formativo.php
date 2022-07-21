<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$carrera = $_POST['carrera'];
$n_modulo = $_POST['n_modulo'];
$nombre_mod = $_POST['nombre_mod'];


	$insertar = "INSERT INTO modulo_formativo (id_carrera_profesional, nro_modulo, nombre) VALUES ('$carrera','$n_modulo','$nombre_mod')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../modulo_formativo.php'
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