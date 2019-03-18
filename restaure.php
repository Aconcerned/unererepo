<html>
<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->

<style>
body{background-image: url("imagenes/fondo_une.jpg")}

</style>

</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "prueba");

if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
        $res = "El archivo no es un archivo sql. Haga click en aceptar para intentarlo nuevamente";
        echo "<script type='text/javascript'>alert('$res');
        window.location.href='javascript:history.go(-1)';
        </script>";

    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
            $res2 = "Se restauro todo correctamente, haga click en en el botón para ser redireccionado";
            echo "<script type='text/javascript'>alert('$res2');
            window.location.href='javascript:history.go(-1)';
            </script>";
        }
    } // end if file exists
    return $response;
}
?>