<?php
// Iniciar variables
$nombre = ""; // nombre del profesor
$materia= ""; // materia del profesor
$fecha = "";  // dia-mes-año de la actividad
$fechaemp = ""; // hora a la que empieza
$fechater = ""; // hora a la que termina
$numero = "";   // computadores a usar
$errors2 = array(); 
$res="EXITO!"; //Si todo sale bien

// conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'prueba');

// registrar usuario

if (isset($_POST['submit'])) {
  // Obtener todos los datos de la forma
  $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
  $materia = mysqli_real_escape_string($db, $_POST['materia']);
  $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
  $fechaemp = mysqli_real_escape_string($db, $_POST['fechaemp']);
  $fechater = mysqli_real_escape_string($db, $_POST['fechater']);
  $numero = mysqli_real_escape_string($db, $_POST['numero']);

  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors2, "El nombre no esta"); }
  if (empty($materia)) { array_push($errors2, "La materia no esta"); }
  if (empty($fecha)) { array_push($errors2, "La fecha no esta"); }
  if (empty($fechaemp)) { array_push($errors2, "La hora del comienzo no esta"); }
  if (empty($fechater)) { array_push($errors2, "La hora a la que debe terminar no esta"); }
  if (empty($numero)) { array_push($errors2, "No se especificó el numero de computadores");  }
  
  // Muestra error si se ponen 0 computadores

  // Registrar si no hay errores
  if (count($errors2) == 0) {

  	$query = "INSERT INTO reservacdt (nombre, materia, fecha, fechaemp, fechater, numero) 
  			  VALUES('$nombre', '$materia', '$fecha', 'fechaemp', 'fechater', '$numero')";
  	mysqli_query($db, $query);
	echo $res;
  }
}