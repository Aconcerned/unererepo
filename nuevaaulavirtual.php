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
  $salon = 'aula_virtual';
  $limit = '6';

  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors, "El nombre no esta"); }
  if (empty($materia)) { array_push($errors, "La materia no esta"); }
  if (empty($fecha)) { array_push($errors, "La fecha no esta"); }
  if (empty($fechaemp)) { array_push($errors, "La hora de inicio no esta"); }
  if (empty($fechater)) { array_push($errors, "La hora de terminacion no esta"); }
  if (empty($numero)) { array_push($errors, "No se especificó el numero de computadores"); }
  
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

   //Revisar si hay una clase en exactamente el mismo dia y la misma hora
   
   $date_check_query = "SELECT * FROM reservatodo WHERE fecha='$fecha' AND salon='$salon' AND fechaemp='$fechaemp'";
   $result = mysqli_query($db, $date_check_query);
   $date = mysqli_fetch_assoc($result);

   $count_query = "SELECT SUM(Conteocdt) FROM reservatodo WHERE fecha='$fecha' AND salon='aula_virtual' AND fechaemp='$fechaemp'";
   $result2 = mysqli_query($db, $count_query); 
   $conteo =  mysqli_fetch_assoc($result2);

   if($conteo === $limit AND $fecha === $date['fecha'] AND $date['fechaemp']===$fechaemp){
   echo ''; 
   echo 'Algo salio mal';
   echo '';
   array_push($errors, "No hay computadores disponibles en esa fecha, intente otra fecha");
   }

   if($conteo > $limit AND $fecha === $date['fecha'] AND $date['fechaemp']===$fechaemp){
    echo ''; 
    echo 'Algo salio mal';
    echo '';
    array_push($errors, "No hay computadores disponibles en esa fecha, intente otra fecha");
    }

  
  if (count($errors) == 0) {
  	$query = "INSERT INTO reservatodo(nombre, materia, salon, fecha, fechaemp, fechater, numero, fechainscripcion, Conteocdt) 
  			  VALUES('$nombre', '$materia', 'aula_virtual', '$fecha', '$fechaemp', '$fechater', '$numero', now(), '$numero')";
  	mysqli_query($db, $query);
	echo $res;
  }
  
}