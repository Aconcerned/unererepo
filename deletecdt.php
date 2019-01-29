<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Problema conectandose: " . mysqli_connect_error());
// Check connection
if (mysqli_connect_errno()) {
	printf("Problema conectandose: %s\n", mysqli_connect_error());
	exit();
}

// sql to delete a record
$sql = "DELETE FROM reservatodo WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: cdtclase.php'); 
    exit;
} else {
    echo "Error borrando";
}

?>