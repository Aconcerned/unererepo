<?php include('meternuevocdt.php'); ?>
<html> 
<head>
<link rel="stylesheet" href="estilos\reserva.css">

<style>
body{background-image: url("imagenes/fondo_une.jpg")}
</style>


<center><h1>Reservaciones para el Centro de Tecnologia<h1/></center>
<center><h2>Seleccione una de las siguientes opciones<h2/></center>
</head>

<body>

<div style="text-align: center"> <!-- Los botones -->
<input type ="button" id="nueva" name="nueva" align="center" onclick="Mostrarnuevo()" value="Crear nueva clase">
<input type ="button" id="editar" name="editar" align="center" value="Editar una clase">
</div>

<div id="formularionuevaclase"> <!-- El formulario para hacer una nueva clase -->

<h2>Nueva clase</h2>
<h3>Todos los campos son requeridos</h3>

<form method="POST" action ="reservoriocdt.php"/> <!-- El formulario en si -->
    <?php include('errors2.php'); ?> <!-- Detector de errores -->
    <label for="nom"><b>Nombre del profesor</b></label>
    <input type="text" placeholder="Escriba el nombre del profesor" name="nombre" id ="nombre" required<?php echo $nombre; ?>></input>

    <label for="mat"><b>Materia que da</b></label>
    <input type="text" placeholder="Escriba la materia del profesor" name="materia" id ="materia" required<?php echo $materia; ?>></input>
	
	<label for="dat"><b>Dia de la actividad</b></label>
    <input id="fecha" name="fecha" type="date" format="YYYY-MM-DD" <?php echo $fecha; ?>></input>
	
	<label for="hor1"><b>Hora que empieza. Valido de: 8AM (8:00) a 4PM (16:00)</b></label>
    <div class="control1">
        <input type="time" id="fechaemp" name="fechaemp"
               min="8:00" max="17:00" <?php echo $fechaemp; ?>></input>
    </div>
	
	<label for="hor2"><b>Hora que termina. Valido de: 9AM (9:00) a 5PM (17:00)</b></label>
    <div class="control2">
        <input type="time" id="fechater" name="fechater"
               min="9:00" max="17:00" <?php echo $fechater; ?>></input>
    </div>
    
	<label for="num"><b>Computadores a usar (Maximo 25)</b></label>
	<input type="number" placeholder="Escriba el numero entero" name="numero" id ="numero" required <?php echo $numero; ?>></input>
	
	<input type="submit" id="submit" value="Crear clase"></input>

	<div class="container" style="background-color:#f1f1f1">
    <button type="Reset" class="floated">Limpiar campos</button>
    </div>
</form>
</div>

<script> <!-- Scripts a usar -->

function Mostrarnuevo() { <!-- Mostrar el formulario -->
    var x = document.getElementById("formularionuevaclase");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

</script>

</body>

</html> 