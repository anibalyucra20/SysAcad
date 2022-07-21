<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$codigo = $_POST['codigo'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$resolucion = $_POST['resolucion'];

	$insertar = "INSERT INTO carrera_profesional (codigo, tipo, nombre, resolucion) VALUES ('$codigo','$tipo','$nombre','$resolucion')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../carrera_profesional.php'
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