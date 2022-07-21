<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$descripcion = $_POST['descripcion'];
$abrev = $_POST['abrev'];
$afecta = $_POST['afecta'];
$caracter = $_POST['caracter'];

	$insertar = "INSERT INTO observacion (descripcion, abreviatura, afecta_ponderado, caracter_si_cero) VALUES ('$descripcion','$abrev','$afecta', '$caracter')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../observaciones.php'
    			</script>";
	}else{
			echo "<script>
			alert('Error al Actualizar periodo actual, por favor contacte al administrador');
			window.history.back();
				</script>
			";
	}
	






mysqli_close($conexion);

?>