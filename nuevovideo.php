<?php
// Iniciar variables
$nombre = "";
$materia = "";
$fecha = "";
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
  $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
  $fechaemp = mysqli_real_escape_string($db, $_POST['fechaemp']);
  $fechater = mysqli_real_escape_string($db, $_POST['fechater']);
  $limit = 2;

  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors, "El nombre no esta"); }
  if (empty($materia)) { array_push($errors, "La materia no esta"); }
  if (empty($fecha)) { array_push($errors, "La fecha no esta"); }
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

  $count_query = "SELECT SUM(Conteovideo) FROM reservatodo WHERE fecha='$fecha' AND fechaemp='$fechaemp'";
  $result2 = mysqli_query($db, $count_query); 
  $conteo =  mysqli_fetch_assoc($result2);

  if($conteo["SUM(Conteovideo)"] >= $limit){
    echo ''; 
    echo 'Algo salio mal';
    echo '';
    array_push($errors, "No hay videobeams disponibles en esa hora, intente otra fecha");
    }
  
    // Si no hay errores, hace el insertar
  if (count($errors) == 0) {
  	$query = "INSERT INTO reservatodo(nombre, materia, salon, fecha, fechaemp, fechater, fechainscripcion, Conteovideo) 
  			  VALUES('$nombre', '$materia', 'videobeam', '$fecha', '$fechaemp', '$fechater', now(), 1)";
  	mysqli_query($db, $query);
	echo $res;
  }
  
}
