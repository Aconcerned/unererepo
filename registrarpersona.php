<?php include('connect_db.php') ?>
<html> <!-- Inicio -->
<head> <!-- Logo, menu, el css, etc -->

<link rel="stylesheet" href="estilos\registrar1.css">

<style>

body {
    background-image: url(imagenes/fondo_une.jpg);
}

</style>

</head>

<body> <!-- El formulario en si -->
<br></br>
<div style="text-align: center;"><a href="registrarpersona.php">Haga click para refrescar</a></div>
<center><h1>Formulario de Registro</h1></center>
<center><h3>Todos los campos son requeridos</h3></center>
<h3>Nota: Es sensible a mayúsculas y minúsculas, por favor escriba de manera consistente. Por ejemplo: "hola" no es igual a "HOLA" u "HoLa"</h3>

<br></br>
<div id="caplock" style="none">El bloqueo de mayúsculas está activado</div>

<form method="POST" action ="registrarpersona.php"> <!-- El formulario en si -->
    <?php include('errors.php'); ?> <!-- Detector de errores -->

    <label for="nom"><b>Nombre de usuario:</b></label>
    <br></br>
    <input type="text" onKeyPress="isMayus(event)" placeholder="Escriba su nombre de usuario" name="nombre" id ="nombre" required<?php echo $nombre; ?>"></input>
    <br></br>

    <label for="clav"><b>Clave:</b></label>
    <br></br>
    <input type="password" onKeyPress="isMayus(event)" placeholder="Escriba su clave de usuario" name="clave" id ="clave" required<?php echo $clave; ?>"></input>
    <br></br>
    
    <label for="em"><b>Email:</b></label>
    <br></br>
    <input type="email" placeholder="Escriba su email" name="email" id ="email" required<?php echo $email; ?>"></input>
    <br></br>

    <label for="ced"><b>Cedula de identidad:</b></label>
    <br></br>
    <input type="number" placeholder="Escriba su cedula de identidad" name="cedula" id ="cedula" required<?php echo $cedula; ?>></input>
    <br></br>

    <input type="submit" id="submit" name="submit" value="Registrarse"></input>

<div class="container" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
</div>
 
</form>
  
<script>
    var x = document.getElementById("caplock"); //Detecta si esta escribiendo en mayusculas y muestra esto o no
    function isMayus(input){
    kCode=input.keyCode?input.keyCode:input.which;
    sKey=input.shiftKey?input.shiftKey:((kCode==16)?true:false);

    if(((kCode>=65&&kCode<=90)&&!sKey)||((kCode>=97&&kCode<=122)&&sKey))
    {
        x.style.display = "block";
    }else{ 
        x.style.display = "none";
    }
}
</script>
</body>
</html>