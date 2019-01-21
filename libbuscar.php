<html>
<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->

<style>

body{background-image: url("imagenes/fondo_une.jpg")}

</style>

<?php
$niet= $_POST['niet'];
$db = mysqli_connect('localhost', 'root', '', 'prueba');
$niet = mysqli_real_escape_string($db, $niet);

$query="select * from reservalib where nombre = '$niet' OR materia='$niet'"; //Buscar por nombre o materia
$result = mysqli_query($db, $query);
$res = '';

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $res = "Se encontró al profesor: <tr><td>"." ".$row['nombre']."."." "."El cual da la materia:"." ".$row['materia']."."." "."Su fecha de inscripcion en el sistema es:"." ".$row['fechainscripcion']."</td></tr>"."<br><br>";
	echo $res;
	//Te regresa a la pagina anterior
	echo '<div style="text-align: center;"><a href="javascript:history.go(-1);">Haga click para refrescar</a></div>';
  }
}else{
    $res = "No se encontraron datos<br><br>";
	echo $res;
	//Te regresa a la pagina anterior
	echo '<div style="text-align: center;"><a href="javascript:history.go(-1);">Haga click para refrescar</a></div>';
  }

?>
</html>