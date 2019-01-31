<html>

<head>

<style>
body{
	body{background-image: url("imagenes/fondo_une.jpg")}
}
</style>
</head>

<body>
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'prueba'); //Datos de la base de datos

$nombre = $_POST['nombre']; //Obtener datos
$clave = $_POST['clave']; //Obtener datos

$nombre = mysqli_real_escape_string($db, $nombre); //Evita SQL injection
$clave = mysqli_real_escape_string($db, $clave);  //Evita SQL injection
 
$clave = md5($clave); //Convierte la clave en md5

$query = "SELECT * from usuarios WHERE nombre = '$nombre' AND clave = '$clave' ";
 
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC); //Agarra los datos de la fila

$count = mysqli_num_rows($result);

$res = "Error de usuario y/o clave";

 if($row["nombre"]){ //Revisa si todo salio bien
		$res = '';
		$_SESSION['id']= $get2['id'];
		$_SESSION['Cargo']=$row['Cargo'];
		$_SESSION['nombre']=$row['nombre'];
        
        header("Location:index.php?id=$id"); //Inicia la sesion
 }else{
 echo $res;
}
 ?>
 </body>
 </html>