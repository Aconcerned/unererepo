<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Fallo la conexión: " . mysqli_connect_error());
// Check connection
if (mysqli_connect_errno()) {
	printf("Fallo la conexión: %s\n", mysqli_connect_error());
	exit();
}

// sql to delete a record
$sql = "DELETE FROM reservatodo WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: libclase.php'); 
    exit;
} else {
    echo "Algo salio mal mientras se borraba la fila";
}

?>