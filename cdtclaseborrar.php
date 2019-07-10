<html>
<style>
body {font-family: Arial, Helvetica, sans-serif}
form {border: 3px solid #f1f1f1;}

body {
    color: darkgreen;
}
</style>
<?php
$nombreprofe = $_POST['nombreprofe'];

$db = mysqli_connect('localhost', 'root', '', 'prueba');
$nombreprofe = mysqli_real_escape_string($db, $nombreprofe);

$query = "DELETE FROM reservacdt WHERE nombre or fechainscripcion = '$nombreprofe'"; 
$result = mysqli_query($db, $query);
$res = '';

if (mysqli_affected_rows($db) > 0) {
    $res = 'Se borraron los datos. Refresque la pagina para ver la tabla denuevo usando el link de abajo';
	echo $res;
	echo '<div style="text-align: center;"><a href="cdtclase.php">Haga click para refrescar</a></div>';
	//Te regresa a la pagina anterior
	
}else{
    $res = "No se encontro nada para borrarlo. Refresque la pagina para ver la tabla denuevo usando el link de abajo";
	echo $res;
	//Te regresa a la pagina anterior
	echo '<div style="text-align: center;"><a href="javascript:history.go(-1);">Haga click para refrescar</a></div>';
  }
?>
</html>