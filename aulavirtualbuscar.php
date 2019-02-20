<html>

<style>
body{background-image:url(imagenes/fondo_une.jpg)}
</style>

<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->

<?php
$niet= $_POST['niet'];
$db = mysqli_connect('localhost', 'root', '', 'prueba');
$niet = mysqli_real_escape_string($db, $niet);

$query="select * from reservatodo where salon='aula_virtual' AND nombre = '$niet'";
$result = mysqli_query($db, $query);
$res = '';

//Esto permite buscar el profesor por el nombre o la materia
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$res = "Se encontró al profesor:"." ".$row['nombre']."."." "."El cual da la materia:"." ".$row['materia']."."." "."Su fecha de inscripcion en el sistema es:"." ".$row['fechainscripcion']." "." ";
		
		//Te regresa a la pagina anterior
		echo "<script type='text/javascript'>alert('$res');
	</script>";
}
echo '<div style="text-align: center;"><a href="javascript:history.go(-1);">Haga click para refrescar</a></div>';
}else{
	//Te regresa a la pagina anterior
	echo "<script type='text/javascript'>alert('No se encontro una clase, haga click en el botón para volver');
	window.location.href='javascript:history.go(-1)';
</script>";
}
?>
</html>