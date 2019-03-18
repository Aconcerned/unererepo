<?php
// Iniciar variables
use PHPMailer\PHPMailer\PHPMailer; //No quites esto, o los emails no funcionaran
use PHPMailer\PHPMailer\Exception; //No quites esto, o los emails no funcionaran

require 'PHPMailer-6.0.5/src/Exception.php'; //Permite obtener los errores del mailer
require 'PHPMailer-6.0.5/src/PHPMailer.php'; //Codigo del mailer en si
require 'PHPMailer-6.0.5/src/SMTP.php'; //Hace la conexion al servidor SMTP
$mail = new PHPMailer();

$nombre = "";
$clave    = "";
$email = "";
$cedula = "";
$errors = array(); 
$res="EXITO! Se ha enviado un correo, revise si le llego"; //Si todo sale bien

// conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'prueba');

// registrar usuario

if (isset($_POST['submit'])) {
  // Obtener todos los datos de la forma
  $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
  $clave = mysqli_real_escape_string($db, $_POST['clave']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $cedula = mysqli_real_escape_string($db, $_POST['cedula']);
  
  // Muestra los errores si de alguna manera el usuario nego los required
  if (empty($nombre)) { array_push($errors, "El nombre no esta"); }
  if (empty($clave)) { array_push($errors, "La clave no esta"); }
  if (empty($email)) { array_push($errors, "El email no esta"); }
  if (empty($cedula)) { array_push($errors, "La cedula no esta"); }
  
  //Revisa si la cedula es un numero
  if (is_int($cedula)) {
  array_push($errors, "La cedula no es un numero");
  }
  
  // Revisa si la cedula ya existe
  $cd_check_query = "SELECT * FROM usuarios WHERE cedula='$cedula' LIMIT 1";
  $result = mysqli_query($db, $cd_check_query);
  $user_cd = mysqli_fetch_assoc($result);
  
  if ($user_cd) { // Si la cedula del usuario existe
    if ($user_cd['cedula'] === $cedula) {
      array_push($errors, "La cedula coincide con una ya registrada");
    }
  }
  
  // Revisa si el usuario ya existe por su nombre o clave
  $user_check_query = "SELECT * FROM usuarios WHERE nombre='$nombre' OR clave='$clave' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // Si el nombre o la clave de usuario ya existe
    if ($user['nombre'] === $nombre) {
      array_push($errors, "El nombre coincide con uno ya registrado");
    }

    if ($user['clave'] === $clave) {
      array_push($errors, "La clave coincide con una ya registrada");
    }
  }

  // Registrar al usuario si no hay errores
  if (count($errors) == 0) {
  	$clave = md5($clave); //Convertir la clave en md5
  	$query = "INSERT INTO usuarios (nombre, clave, email, cedula, Cargo) 
  			  VALUES('$nombre', '$clave', '$email', '$cedula', '1')";
  echo "<script type='text/javascript'>alert('$res');
  window.location.href='javascript:history.go(-1)';
  </script>";
  	mysqli_query($db, $query);
	
	$mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth   = true;         // enable SMTP authentication
    $mail->SMTPSecure = "tls";        // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
    $mail->Username   = "mailboyforone2@gmail.com";  // GMAIL nombre, nota: debes permitirle al servidor de que permita aplicaciones de otras procedencias, si no no te va a dejar
    $mail->Password   = "hellotheregeneralkenobi";            // GMAIL clave
   	$mail->SMTPDebug = 0;
	
	     $mail->From = "mailboyforone2@gmail.com";
        $mail->FromName = "Hola";
        $mail->AddAddress($_POST['email']);
        $mail->AddReplyTo("mailboyforone2@gmail.com", "Hola");
        $mail->Subject = 'Se ha registrado exitosamente (Email automatizado)';
        $mail->Body = "Usted se ha registrado como profesor en el sistema de reservas de salones de computación de la Universidad Nueva Esparta. Si usted no se ha registrado, ignore éste correo";
		
        //Mandar mail
        if (!$mail->Send())
        {
          $res2 = "Ocurrió un error mandando el correo:" . $mail->ErrorInfo;
          echo "<script type='text/javascript'>alert('$res2');
          window.location.href='javascript:history.go(-1)';
          </script>";
            exit;
        }
    echo '<br></br>';
    echo "Se mandó un correo, revise si le llego";
	}
}