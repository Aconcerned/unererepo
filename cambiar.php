<?php
//Archivo de conexion 
include_once("connection.php");
$sql = "SELECT * FROM `usuarios` limit 69 ";
$queryRecords = mysqli_query($conn, $sql) or die("Error al buscar");
?>

<html>

<head>

<meta charset="UTF-8">
<script type="text/javascript" src="jquery-1.11.1.min.js"></script> <!-- Se comunica con jquery para editar la tabla -->
<link rel="stylesheet" href="estilos\clase.css"> <!-- El css de la pagina, mas que todo el de la tabla -->

<style>
body{
background-image: url("imagenes/fondo_une.jpg")
}
</style>

</head>

<body>
<!-- Refresca la pagina -->
<div style="text-align: center;"><a href="cambiar.php">Haga click para refrescar</a></div>


<div class="container" style="padding:50px 250px;">
<center><h1>Usuarios actuales en el sistema (1 es profesor, 2 es administrador)</h1></center>
<div id="msg" class="alert"></div> <!-- Da las alertas en connection -->
<table id="employee_grid" name="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
         <th><center>Nombre</center></th>
         <th><center>Email</center></th>
		 <th><center>Cedula</center></th>
		 <th><center>Cargo</center></th>
      </tr>
   </thead>
   <tbody id="_editable_table"> <!-- Usando los datos en connection, se imprimen los datos de uno en uno -->
      <?php foreach($queryRecords as $res) :?> <!-- Inicio del ciclo for -->
      <tr data-row-id="<?php echo $res['id'];?>">
         <td class="editable-col" contenteditable="false" colcambiar='0' oldVal ="<?php echo $res['nombre'];?>"><?php echo $res['nombre'];?></td>
         <td class="editable-col" contenteditable="false" colcambiar='1' oldVal ="<?php echo $res['email'];?>"><?php echo $res['email'];?></td>
         <td class="editable-col" contenteditable="false" colcambiar='2' oldVal ="<?php echo $res['cedula'];?>"><?php echo $res['cedula'];?></td>
		 <td class="editable-col" contenteditable="true"  colcambiar='3' oldVal ="<?php echo $res['Cargo'];?>"><?php echo $res['Cargo'];?></td>
   
   </tr>
	  <?php endforeach;?> <!-- Fin del ciclo for -->
   </tbody>
</table>
</div>

<script>
$(document).ready(function(){ <!-- Permite editar la tabla en si -->
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['cambiar'] = $(this).attr('colcambiar');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "servercambiar.php",  <!-- Se conecta a este archivo php que contiene alertas y la conexion -->
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

</html>