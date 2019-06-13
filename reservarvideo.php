<?php include('nuevovideo.php'); ?>

<?php
//Archivo de conexion 
session_start();
$_SESSION['nombre'];

include_once("connection.php");
?>

<html> 

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<head>
<link rel="stylesheet" href="estilos\disenovideo.css">

<style>
body{background-image:url(imagenes/fondo_une.jpg)}
</style>

<center><h1>Hacer reservaciones para videobeam<h1/></center>
</head>

<body>

<div style="text-align: center">

<input type ="button" id="nueva" name="nueva" align="center" onclick="Mostrarnuevo()" value="Crear nueva reservación">

</div>


<div id="formularionuevovideo" display: "none"> 
<center><h2>Nueva reservación</h2></center>
<center><h3>Todos los campos son requeridos</h3></center>
<div style="text-align: center;"><a href="https://browser-update.org/es/update-browser.html" target="_blank">Si no puede ver los campos de fecha y hora, haga click para ver si necesita actualizar su navegador</a></div> 

<br></br>

<form method="POST" action ="reservarvideo.php"/> <!-- El formulario en si -->
    <?php include('errors.php'); ?>
    <center><h3>Coloque todos los datos pedidos</h3></center>
    <br></br>
    <center><label for="nom"><b>Nombre</b></label></center>
    <center>
    <input type="text" readonly="readonly" value="<?php echo htmlentities($_SESSION['nombre']); ?>" placeholder="Escriba el nombre del profesor" name="nombre" id ="nombre"<?php echo $nombre; ?> ></input>
    </center>
    <br></br>
    <br></br>

   <center><label for="mat"><b>Materia que da</b></label></center>
   <!-- <input type="text" placeholder="Escriba la materia del profesor" name="materia" id ="materia" ></input>-->

   <center>
   <select name="materia" id="materia" <?php echo $materia; ?>>  
   <option value="INTRODUCCION A LA COMPUTACION">INTRODUCCION A LA COMPUTACION</option>   
   <option value="PROGRAMACION I">PROGRAMACION I</option>        
   <option value="PROGRAMACION II">PROGRAMACION II</option>   
   <option value="PROGRAMACION III">PROGRAMACION III</option> 
   <option value="PROGRAMACION IV">PROGRAMACION IV</option> 
   <option value="PROGRAMACION V">PROGRAMACION V</option> 
   <option value="PROGRAMACION VI">PROGRAMACION VI</option> 
   <option value="PROGRAMACION VII">PROGRAMACION VII</option>  
   <option value="INTERACCION HUMANO - COMPUTADOR">INTERACCION HUMANO - COMPUTADOR</option>   
   <option value="TECNICAS DE PROGRAMACION">TECNICAS DE PROGRAMACION</option>     
   <option value="SISTEMAS OPERATIVOS I">SISTEMAS OPERATIVOS I</option> 
   <option value="SISTEMAS OPERATIVOS II">SISTEMAS OPERATIVOS II</option>
   <option value="INGENIERIA DEL SOFTWARE">INGENIERIA DEL SOFTWARE</option>  
   <option value="COMPUTACION I">COMPUTACION I</option>        
   <option value="COMPUTACION II">COMPUTACION II</option>   
   <option value="COMPUTACION III">COMPUTACION III</option> 
   <option value="COMPUTACION IV">COMPUTACION IV</option> 
   <option value="COMPUTACION V">COMPUTACION V</option> 
   <option value="COMPUTACION VI">COMPUTACIONVI</option> 
   <option value="COMPUTACION VII">COMPUTACION VII</option>  
   <option value="COMPUTACION VIII">COMPUTACION VIII</option>  
   <option value="COMPUTACION IX">COMPUTACION IX</option>  
   <option value="COMPUTACION X">COMPUTACION X</option>  
   <option value="TOPOGRAFIA">TOPOGRAFIA</option>  
   <option value="ESTRUCTURAS I">ESTRUCTURAS I</option>  
   <option value="ESTRUCTURAS II">ESTRUCTURAS II</option>
   <option value="PUENTES">PUENTES</option>
   <option value="DIBUJO">DIBUJO</option>
   <option value="DISENO I">DISEÑO I</option>  
   <option value="DISENO II">DISEÑO II</option>  
   <option value="DISENO III">DISEÑO III</option> 
   <option value="DISENO IV">DISEÑO IV</option> 
   <option value="DISENO V">DISEÑO V</option> 
   <option value="DISENO VI">DISEÑO VI</option> 
   <option value="DISENO VII">DISEÑO VII</option> 
   <option value="DISENO VIII">DISEÑO VIII</option> 
   <option value="DISENO IX">DISEÑO IX</option> 
   <option value="DISENO X">DISEÑO X</option>
   <option value="DIBUJO TECNICO">DIBUJO TECNICO</option>  
   <option value="COLOR">COLOR</option>  
   <option value="CREATIVIDAD">CREATIVIDAD</option>  
   <option value="DIBUJO LIBRE I">DIBUJO LIBRE I</option>  
   <option value="DIBUJO LIBRE II">DIBUJO LIBRE II</option>
   <option value="ILUSTRACION I">ILUSTRACION I</option>  
   <option value="ILUSTRACION II">ILUSTRACION II</option> 
   <option value="ILUSTRACION III">ILUSTRACION III</option> 
   <option value="MATEMATICA DISCRETA I">MATEMATICA DISCRETA I</option> 
   <option value="MATEMATICA DISCRETA II">MATEMATICA DISCRETA II</option> 
   <option value="MATEMATICA I">MATEMATICA I</option>   
   <option value="MATEMATICA II">MATEMATICA II</option> 
   <option value="MATEMATICA III">MATEMATICA III</option>
   <option value="MATEMATICA IV">MATEMATICA IV</option>    
   <option value="INGLES I">INGLES I</option>   
   <option value="INGLES II">INGLES II</option>  
   <option value="INGLES III">INGLES III</option>   
   <option value="INGLES IV">INGLES IV</option>
   <option value="INTRODUCCION A LA COMPUTACION">INTRODUCCION A LA COMPUTACION</option>   
   <option value="FORMACION CIUDADANA">FORMACION CIUDADANA</option>   
   <option value="ESTADISTICA I">ESTADISTICA I</option>   
   <option value="ESTADISTICA II">ESTADISTICA II</option>   
   <option value="ESTADISTICA III">ESTADISTICA III</option>  
   </select>   
   </center>

   <br></br>
   <br></br>

   <center><label for="fec"><b>Fecha</b></label></center>
    <center>
    <input type="date" name="fecha" min= <?php echo date('Y-m-d');?> id ="fecha" required<?php echo $fecha; ?>"></input>
    </center>

    <br></br>
    <br></br>

    <center><label for="hor1"><b>Hora a la que empieza</b></label></center>
    <center>
    <input type="time" min="08:30" max="16:00" name="fechaemp" id ="fechaemp" required<?php echo $fechaemp; ?>"></input>
    </center>
    
    <br></br>
    <br></br>

	<center><label for="hor2"><b>Hora a la que termina</b></label></center>
    <center>
    <input type="time" min="09:30" max="17:00" name="fechater" id ="fechater" required<?php echo $fechater; ?>"></input>
    </center>

    <div style="text-align: center">
	<input type="submit" aling="center" id="submit" name="submit" value="Crear reserva"></input>
    </div>

	<div style="text-align: center" class="container" aling="center" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
    </div>
	</form>
</div>


<script> <!-- Scripts a usar -->

function Mostrarnuevo(){var e=document.getElementById("formularionuevovideo");new Audio("audio/mouse.mp3").play(),"block"===e.style.display?(e.style.display="none",document.getElementById("nueva").value="Crear nueva reservación"):(e.style.display="block",document.getElementById("nueva").value="Quitar formulario")}

</script>

</body>

</html>
