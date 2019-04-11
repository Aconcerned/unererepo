<?php include('connect_db.php') ?>
<html> <!-- Inicio -->

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<head> <!-- Logo, menu, el css, etc -->

<link rel="stylesheet" href="estilos\registrar3.css">

<style>

body {
    background-image: url(imagenes/fondo_une.jpg);
}

</style>

</head>

<body> <!-- El formulario en si -->
<center><h1>Formulario de Registro para profesores</h1></center>
<center><h3>Todos los campos son requeridos</h3></center>
<h3>Nota: Es sensible a mayúsculas y minúsculas, por favor escriba de manera consistente. Por ejemplo: "hola" no es igual a "HOLA" u "HoLa"</h3>
<br></br>

<center>
<b><div id="caplock" style="none">El bloqueo de mayúsculas está activado</div></b>
</center>

<form method="POST" action ="registrarpersona.php"> <!-- El formulario en si -->
    <?php include('errors.php'); ?> <!-- Detector de errores -->
    <center><h3>Coloque sus datos</h3></center>
    <br></br>
    <center><label for="nom"><b>Nombre de usuario</b></label></center>
    <center>
    <input type="text" onKeyPress="isMayus(event)" placeholder="Escriba su nombre" name="nombre" id ="nombre" required<?php echo $nombre; ?>"></input>
    </center>

    <br></br>
    <br></br>

    <center><label for="clav"><b>Clave</b></label></center>
    <center>
    <input type="password" onKeyPress="isMayus(event)" placeholder="Escriba su clave" name="clave" id ="clave" required<?php echo $clave; ?>"></input>
    </center>

    <br></br>
    <br></br>

    <center><label for="em"><b>Email</b></label></center>
    <center>
    <input type="email" placeholder="Escriba su email" name="email" id ="email" required<?php echo $email; ?>"></input>
    </center>
    
    <br></br>
    <br></br>

    <center><label for="ced"><b>Cedula de identidad</b></label></center>
    <center>
    <input type="number" placeholder="Su cedula sin puntos" name="cedula" id ="cedula" required<?php echo $cedula; ?>></input>
    </center>

    <br></br>
    <br></br>

    <center><input type="submit" id="submit" name="submit" value="Registrarse"></input></center>

<center>
<div class="container" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
</div>
</center>

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