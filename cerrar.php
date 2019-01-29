<html>
<head>
</head>

<body>

</body>
</html>
<?php
    echo 'Cerrando la sesion. Nos vemos';
	session_start();
	session_destroy();
	session_start();
	$_SESSION['Cargo']='';
	header("Location: index.php");
?>