<?php

$conexion = mysqli_connect('localhost','root','','sisacad22');

$semestre = $_POST['semestre'];

	$insertar = "INSERT INTO semestre (semestre) VALUES ('$semestre')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../semestre.php'
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