<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Fallo la conexión: " . mysqli_connect_error());
// Revisar conexion
if (mysqli_connect_errno()) {
	printf("Fallo la conexión: %s\n", mysqli_connect_error());
	exit();
}

// Codigo para borrar 
$sql = "DELETE FROM reservatodo WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: disenoclase.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Algo salio mal mientras se borraba la fila";
}

?>