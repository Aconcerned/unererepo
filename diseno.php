<?php 
include('nuevodiseno.php');
?>

<?php
//Archivo de conexion 
session_start();
$_SESSION['nombre'];

include_once("connection.php");
$sql = "SELECT * FROM `reservatodo` WHERE salon='diseno' limit 10 ";
$queryRecords = mysqli_query($conn, $sql) or die("Error al buscar");
?>

<html> 
<head>

<link rel="stylesheet" href="estilos\diseno.css">
<link rel="stylesheet" href="estilos\clase.css">

<style>
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

<center><h1>Hacer reservaciones para el area de diseño<h1/></center>
</head>

<body> <!-- Carga el script de arriba -->

<div style="text-align: center"> <!-- Los botones -->
<input type ="button" id="nueva" name="nueva" align="center" onclick="Mostrarnuevo()" value="Crear nueva clase">
</div>

<div style="text-align: center"> <!-- Los botones -->
<input type ="button" id="to" name="to" align="center" onclick="Mostrarnuevo2()" value="Ver clases">
</div>

<div id="formularionuevaclase"> <!-- El formulario para hacer una nueva clase -->

<center><h2>Nueva clase</h2></center>
<center><h3>Todos los campos son requeridos</h3></center>
<div style="text-align: center;"><a href="https://browser-update.org/es/update-browser.html" target="_blank">Si no puede ver los campos de fecha y hora, haga click para ver si necesita actualizar su navegador</a></div> 
<form method="POST" action ="diseno.php"/> <!-- El formulario en si -->
<?php include('errors.php'); ?>
    <label for="nom"><b>Nombre del profesor:</b></label> 
    <input type="text" value="<?php echo htmlentities($_SESSION['nombre']); ?>" placeholder="Escriba el nombre del profesor" name="nombre" id ="nombre"<?php echo $nombre; ?> ></input>

    <label for="mat"><b>Materia que da:</b></label>
   <!-- <input type="text" placeholder="Escriba la materia del profesor" name="materia" id ="materia" ></input>-->
    
   <select name="materia" id="materia" <?php echo $materia; ?>> 
   <option value="MATEMATICA DISCRETA I">MATEMATICA DISCRETA I</option> 
   <option value="INGLES I">INGLES I</option>   
   <option value="INTRODUCCION A LA COMPUTACION">INTRODUCCION A LA COMPUTACION</option>   
   <option value="FORMACION CIUDADANA">FORMACION CIUDADANA</option>   
   <option value="PROGRAMACION I">PROGRAMACION I</option>   
   <option value="INGLES II">INGLES II</option>   
   <option value="MATEMATICA DISCRETA II">MATEMATICA DISCRETA II</option>   
   <option value="ESTADISTICA I">ESTADISTICA I</option>   
   <option value="PROGRAMACION II">PROGRAMACION II</option>   
   <option value="INTERACCION HUMANO - COMPUTADOR">INTERACCION HUMANO - COMPUTADOR</option>   
   <option value="TECNICAS DE PROGRAMACION">TECNICAS DE PROGRAMACION</option>   
   <option value="INGLES III">INGLES III</option>   
   <option value="ESTADISTICA II">ESTADISTICA II</option>   
   <option value="INGLES IV">INGLES IV</option>   
   <option value="ESTADISTICA III">ESTADISTICA III</option>   
   <option value="MATEMATICA II">MATEMATICA II</option>   
   <option value="PROGRAMACION III">PROGRAMACION III</option> 
   <option value="METODOLOGIA DE LA INVESTIGACION">METODOLOGIA DE LA INVESTIGACION</option> 
   <option value="MATEMATICA III">MATEMATICA III</option> 
   <option value="BASE DE DATOS I">BASE DE DATOS I</option> 
   <option value="PROGRAMACION IV">PROGRAMACION IV</option> 
   <option value="MATEMATICA IV">MATEMATICA IV</option> 
   <option value="PROGRAMACION V">PROGRAMACION V</option> 
   <option value="SISTEMAS OPERATIVOS I">SISTEMAS OPERATIVOS I</option> 
   <option value="PROGRAMACION VI">PROGRAMACION VI</option> 
   <option value="BASE DE DATOS III">BASE DE DATOS II</option> 
   <option value="INGENIERIA DEL SOFTWARE">INGENIERIA DEL SOFTWARE</option> 
   <option value="SISTEMAS OPERATIVOS II">SISTEMAS OPERATIVOS II</option>
   <option value="PROGRAMACION VII">PROGRAMACION VII</option>  
   <option value="BASE DE DATOS IV">BASE DE DATOS IV</option>  
   </select>   
	
	<label for="fec"><b>Fecha:</b></label>
    <input type="date" name="fecha" min= <?php echo date('Y-m-d');?> id ="fecha" required<?php echo $fecha; ?>"></input>

	<label for="hor1"><b>Hora a la que empieza:</b></label>
	<input type="time" min="08:30" max="16:00" name="fechaemp" id ="fechaemp" required<?php echo $fechaemp; ?>"></input>
	
	<label for="hor2"><b>Hora a la que termina:</b></label>
	<input type="time" min="09:30" max="17:00" name="fechater" id ="fechater" required<?php echo $fechater; ?>"></input>
	
	<label for="num"><b>Número de computadores a usar (Máximo 5):</b></label>
	<input type="number" placeholder="Escriba el numero de pcs a usar" min="1" max="5" name="numero" id ="numero"<?php echo $numero; ?>></input>
	
    <div style="text-align: center">
	<input type="submit" aling="center" id="submit" name="submit" value="Crear clase"></input>
    </div>

	<div style="text-align: center" class="container" aling="center" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
    </div>
	
	</form>
</div>

<div class="container" id="tat" style="padding:50px 250px;">
<h1>Clases actuales en el sistema (Diseño)</h1>
<table id="employee_grid" name="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
         <th>Nombre</th>
         <th>Materia</th>
         <th>Fecha de inicio</th>
		 <th>Hora que empieza</th>
		 <th>Hora que termina</th>
		 <th>Número de máquinas a usar</th>
		 <th>Fecha de inscripcion</th>
      </tr>
   </thead>
   <tbody id="_editable_table"> <!-- Usando los datos en connection, se imprimen los datos de uno en uno -->
      <?php foreach($queryRecords as $res) :?> <!-- Inicio del ciclo for-->
      <tr data-row-id="<?php echo $res['id'];?>">
         <td class="editable-col" colcdt='0' oldVal ="<?php echo $res['nombre'];?>"><?php echo $res['nombre'];?></td>
         <td class="editable-col" colcdt='1' oldVal ="<?php echo $res['materia'];?>"><?php echo $res['materia'];?></td>
         <td class="editable-col" colcdt='2' oldVal ="<?php echo $res['fecha'];?>"><?php echo $res['fecha'];?></td>
         <td class="editable-col" colcdt='3' oldVal ="<?php echo $res['fechaemp'];?>"><?php echo $res['fechaemp'];?></td>
		 <td class="editable-col" colcdt='4' oldVal ="<?php echo $res['fechater'];?>"><?php echo $res['fechater'];?></td>
         <td class="editable-col" colcdt='5' oldVal ="<?php echo $res['numero'];?>"><?php echo $res['numero'];?></td>
		 <td class="editable-col" colcdt='6' oldVal ="<?php echo $res['fechainscripcion'];?>"><?php echo $res['fechainscripcion'];?></td>
   </tr>
	  <?php endforeach;?> <!-- Final del ciclo for-->
   </tbody>
</table>
</div>

<script> <!-- Scripts a usar -->

function Mostrarnuevo() { <!-- Mostrar el formulario -->
    var x = document.getElementById("formularionuevaclase");
	var audio = new Audio('audio/mouse.mp3');
	audio.play();
    if (x.style.display === "block") {
        x.style.display = "none";
		document.getElementById("nueva").value="Crear nueva clase";
    } else {
        x.style.display = "block";
		document.getElementById("nueva").value="Quitar formulario";
    }
}

function Mostrarnuevo2() { <!-- Mostrar el formulario de crear clases -->
    var x = document.getElementById("tat");
	var audio = new Audio('audio/mouse.mp3');
	audio.play();
    if (x.style.display === "block") {
        x.style.display = "none";
		document.getElementById("to").value="Ver clases";
    } else {
        x.style.display = "block";
		document.getElementById("to").value="Quitar formulario";
    }
	
}

</script>

</body>

</html> 