<?php
// Iniciar variables
$nombre = "";
$materia = "";
$fechavideo = "";
$fechaemp = "";
$fechater = "";
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
  $fechavideo = mysqli_real_escape_string($db, $_POST['fechavideo']);
  $fechaemp = mysqli_real_escape_string($db, $_POST['fechaemp']);
  $fechater = mysqli_real_escape_string($db, $_POST['fechater']);

  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors, "El nombre no esta"); }
  if (empty($materia)) { array_push($errors, "La materia no esta"); }
  if (empty($fechavideo)) { array_push($errors, "La fecha no esta"); }
  if (empty($fechavideo)) { array_push($errors, "La hora de inicio no esta"); }
  if (empty($fechater)) { array_push($errors, "La hora de terminacion esta no"); }


  // Evitar que el usuario meta la hora de comienzo igual de la hora de terminacion
  if($fechaemp === $fechater){
    echo '';
    echo 'Algo salio mal';
    echo '';
	  array_push($errors, "Las horas de entrada y salida son iguales, cambielas");
  }
  
  if($fechater < $fechaemp){
    echo '';
    echo 'Algo salio mal';
    echo '';
	  array_push($errors, "La hora a la que comienza la clase y la hora a la que termina la clase no tienen sentido, cambielas");
  }

   // Revisar si hay una reservacion en exactamente el mismo dia
   
   $date_check_query = "SELECT * FROM reservatodo WHERE fechavideo='$fechavideo' LIMIT 1";
    
   $result = mysqli_query($db, $date_check_query);
   $date = mysqli_fetch_assoc($result);
 
   if ($fechavideo) { // Si ya existe la clase
     if ($date['fechavideo'] === $fechavideo) {
      echo ''; 
      echo 'Algo salio mal';
      echo '';
      array_push($errors, "Ya hay una a reservacion de video beam en el mismo dia");
     }
   }

    // Si no hay errores, hace el insertar
  if (count($errors) == 0) {
  	$query = "INSERT INTO reservatodo(nombre, materia, salon, fechaemp, fechater, fechavideo, fechainscripcion) 
  			  VALUES('$nombre', '$materia', 'videobeam', '$fechaemp', '$fechater', '$fechavideo', now())";
  	mysqli_query($db, $query);
	echo $res;
  }
  
}
