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

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<head>

<link rel="stylesheet" href="estilos\diseno.css">
<link rel="stylesheet" href="estilos\clase.css">

<style>
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

<center><h1>Hacer reservaciones para el Area de Diseño<h1/></center>
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

<br>
</br>

<form method="POST" action ="diseno.php"/> <!-- El formulario en si -->
<?php include('errors.php'); ?>
    <center><h3>Coloque todos los datos pedidos</h3></center>
    <br></br>
    <center><label for="nom"><b>Nombre</b></label></center>
    <center>
    <input type="text" value="<?php echo htmlentities($_SESSION['nombre']); ?>" placeholder="Escriba el nombre del profesor" name="nombre" id ="nombre"<?php echo $nombre; ?> ></input>
    </center>
    
    <br></br>
    <br></br>

   <center><label for="mat"><b>Materia que da</b></label></center>
   <!-- <input type="text" placeholder="Escriba la materia del profesor" name="materia" id ="materia" ></input>-->
   <center>
   <select name="materia" id="materia" <?php echo $materia; ?>> 
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
   <input type="time" min="08:00" max="16:00" name="fechaemp" id ="fechaemp" required<?php echo $fechaemp; ?>"></input> 
   <center>
   
   <br></br>
   <br></br>

   <center><label for="hor2"><b>Hora a la que termina</b></label><center>
   <center>
   <input type="time" min="09:00" max="17:00" name="fechater" id ="fechater" required<?php echo $fechater; ?>"></input>
   <center>

    <br></br>
    <br></br>

    <center><label for="num"><b>Número de computadores a usar (Máximo 5)</b></label><center>
    <center>
    <input type="number" placeholder="Escriba el numero de pcs a usar" min="1" max="5" name="numero" id ="numero"<?php echo $numero; ?>></input>
    <center>

    <br></br>
    <br></br>
        
    <div style="text-align: center">
    <input type="submit" aling="center" id="submit" name="submit" value="Crear clase"></input>
    </div>

	<div style="text-align: center" class="container" aling="center" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
    </div>
	
	</form>
</div>

<div class="container" id="tat">
<center><h1>Clases actuales en el sistema (Diseño)</h1></center>
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

function Mostrarnuevo(){var e=document.getElementById("formularionuevaclase");new Audio("audio/mouse.mp3").play(),"block"===e.style.display?(e.style.display="none",document.getElementById("nueva").value="Crear nueva clase"):(e.style.display="block",document.getElementById("nueva").value="Quitar formulario de crear clase")}function Mostrarnuevo2(){var e=document.getElementById("tat");new Audio("audio/mouse.mp3").play(),"block"===e.style.display?(e.style.display="none",document.getElementById("to").value="Ver clases"):(e.style.display="block",document.getElementById("to").value="Quitar formulario de busqueda")}

</script>

</body>

</html> 