<?php
// Iniciar variables
$nombre = "";
$materia = "";
$fecha = "";
$fechaemp = '';
$fechater = '';
$numero = '';
$errors = array(); 
$res="EXITO!"; //Si todo sale bien

$today_start = strtotime('today');
$today_end = strtotime('tomorrow');

// conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'prueba');

// registrar usuario

if (isset($_POST['submit'])) {
  // Obtener todos los datos de la forma
  $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
  $materia = mysqli_real_escape_string($db, $_POST['materia']);
  $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
  $fechater = mysqli_real_escape_string($db, $_POST['fechater']);
  $fechaemp = mysqli_real_escape_string($db, $_POST['fechaemp']);
  $numero = mysqli_real_escape_string($db, $_POST['numero']);
  
  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors, "El nombre no esta"); }
  if (empty($materia)) { array_push($errors, "La materia no esta"); }
  if (empty($fecha)) { array_push($errors, "La fecha no esta"); }
  if (empty($fechaemp)) { array_push($errors, "La hora de inicio no esta"); }
  if (empty($fechater)) { array_push($errors, "La hora de terminacion no esta"); }
  if (empty($numero)) { array_push($errors, "No se especificó el numero de computadores"); }
  
  // Evitar que el usuario meta la hora de comienzo igual de la hora de terminacion
  if($fechaemp === $fechater){
	  array_push($errors, "Las horas son iguales, cambielas");
  }
  
    //Si no hay errores, hace el insertar
  if (count($errors) == 0) {
  	$query = "INSERT INTO reservacdt(nombre, materia, fecha, fechaemp, fechater, numero, fechainscripcion) 
  			  VALUES('$nombre', '$materia', '$fecha', '$fechaemp', '$fechater', '$numero', now())";
  	mysqli_query($db, $query);
	echo $res;
  }
  
}
