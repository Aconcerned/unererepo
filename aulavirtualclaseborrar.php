<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
// revisar conexion
if (mysqli_connect_errno()) {
	printf("Fallo la conexión: %s\n", mysqli_connect_error());
	exit();
}

// sql para borrar
$sql = "DELETE FROM reservatodo WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: aulavirtualclase.php');
    exit;
} else {
    echo "Error borrando";
}

?>