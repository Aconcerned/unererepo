<?php
//Archivo de conexion 
include_once("connection.php");
$sql = "SELECT * FROM `reservatodo` WHERE salon='diseno' limit 10 ";
$queryRecords = mysqli_query($conn, $sql) or die("Error al buscar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery-1.11.1.min.js"></script> <!-- Se comunica con jquery para editar la tabla -->
<link rel="stylesheet" href="estilos\clase.css"> <!-- El css de la pagina, mas que todo el de la tabla -->

<style>
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

</head>

<body>
<br></br>
<div style="text-align: center;"><a href="disenoclase.php">Haga click para refrescar</a></div>

<div class="container" style="padding:50px 250px;">
<h1>Clases actuales en el sistema (Salon de diseño):</h1>
<h2>Haga click en un campo para editarlo (La fecha de inscripción no es editable)</h2>
<div id="msg" class="alert"></div> <!-- Da las alertas en connection -->
<div style="text-align: center;"><a href="backup.php" target="_blank">Haga un respaldo en caso de cometer un error (Recomendado)</a></div> 
<table id="employee_grid" name="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
         <th>Nombre</th>
         <th>Materia</th>
         <th>Fecha de inicio</th>
		 <th>Hora que empieza</th>
		 <th>Hora que termina</th>
		 <th>Número de maquinas a usar</th>
		 <th>Fecha de inscripción</th>
		 <th>Borrar</th>
      </tr>
   </thead>
   <tbody id="_editable_table"> <!-- Usando los datos en connection, se imprimen los datos de uno en uno -->
      <?php foreach($queryRecords as $res) :?> <!-- Inicio del ciclo for-->
      <tr data-row-id="<?php echo $res['id'];?>">
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='0' oldVal ="<?php echo $res['nombre'];?>"><?php echo $res['nombre'];?></td></center>
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='1' oldVal ="<?php echo $res['materia'];?>"><?php echo $res['materia'];?></td></center>
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='2' oldVal ="<?php echo $res['fecha'];?>"><?php echo $res['fecha'];?></td></center>
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='3' oldVal ="<?php echo $res['fechaemp'];?>"><?php echo $res['fechaemp'];?></td></center>
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='4' oldVal ="<?php echo $res['fechater'];?>"><?php echo $res['fechater'];?></td></center>
	  <center><td class="editable-col" contenteditable="true" coldisenoclase='5' oldVal ="<?php echo $res['numero'];?>"><?php echo $res['numero'];?></td></center>
	  <center><td class="editable-col" contenteditable="false" coldisenoclase='6' oldVal ="<?php echo $res['fechainscripcion'];?>"><?php echo $res['fechainscripcion'];?></td></center>
		 <?php
		 echo "<td><a href='disenoclaseborrar.php?id=".$res['id']."'>Borrar</a></td>";
		 echo "</tr>";
		 ?>
   </tr>
	  <?php endforeach;?> <!-- Final del ciclo for-->
   </tbody>
</table>
</div>

<div id="boton2" style="text-align: center;"> <!-- Muestra la forma de buscar datos -->
<button onclick="myFunction2()">Mostrar el buscador</button>
</div>

<div id="buscador" name="buscador">
<form method="POST" action="disenoclasebuscar.php" style="padding:50px 250px;">
<h3>Buscar usando el nombre del profesor o su materia</h3>
<input type="text" placeholder="Escriba el nombre del profesor o su materia" name="niet" id="niet">
<input type="submit" id="input buscar" name="input buscar">
</form>
</div>

</body>
</html>

<script type="text/javascript">
function myFunction() { <!-- Muestra el formulario de borrar filas -->
	var x = document.getElementById("borrador");
	var audio = new Audio('audio/mouse.mp3');
    audio.play();
    if (confirm("Esta seguro? Si borra la fila, se borrara en la base de datos")) {
        if (x.style.display === "block") {
        x.style.display = "none";
		document.getElementById("borrador").value="Mostrar forma de borrar datos";
    } else {
        x.style.display = "block";
		document.getElementById("borrador").value="Quitar formulario";
    }
		
    } else {
		x.style.display = "none";   
    }
}

function myFunction2() { <!-- Muestra el formulario de busqueda de filas -->
	var z = document.getElementById("buscador");
	var audio = new Audio('audio/mouse.mp3');
	audio.play();
    if (z.style.display === "block") {
        z.style.display = "none";
		document.getElementById("buscador").value="Mostrar forma de buscar datos";
    } else {
        z.style.display = "block";
		document.getElementById("buscador").value="Quitar formulario";
    }
}

$(document).ready(function(){ <!-- Permite editar la tabla en si -->
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['disenoclase'] = $(this).attr('coldisenoclase');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "serverdiseno.php",  <!-- Se conecta a este archivo php que contiene alertas y la coneccion -->
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#msg").removeClass('alert-danger');
							$("#msg").addClass('alert-success').html(response.msg);
						} else {
							$("#msg").removeClass('alert-success');
							$("#msg").addClass('alert-danger').html(response.msg);
						}
					}   
				});
	});
});

</script>