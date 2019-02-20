<html> <!-- Inicio -->

<?php
 session_start();
 echo @$_SESSION['Cargo']; //Muestra si el usuario inicio o no sesion usando el cargo
 echo '<br></br>';
 echo @$_SESSION['nombre']; //Muestra el nombre del usuario
?>

<head> <!-- Logo, menu, el css, etc -->

<style>
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

<title>Sistema para reservar CDT, salon de diseño, libreria y aula virtual</title>
<link rel="stylesheet" href="estilos\menu1.css">

<center><a href="http://une.edu.ve/" target="_blank">
      <img src="imagenes/banner02.jpg" alt="Universidad Nueva Esparta" height="100" width="100%"/>
    </a>
</center>
<?php //Si el usuario no inicio sesion, muestra esto 
	if(@!$_SESSION['Cargo']){ 
?>

<script type="text/javascript" src="jquery-1.11.1.min.js"></script>

<div id="header">

<!-- Muestra el reloj-->
<iframe src="reloj.php" width="100%" height="48px" name="relojito">
</iframe>

<!-- Muestra contenido de los archivos php-->
<ul class="main-nav">
  <li><a href="bienvenida.php" target="contenido">Principal</a></li> <!-- Archivo de bienvenida-->
  <li><a href="registrarpersona.php" target="contenido">Registrarse</a></li> <!-- El registro -->
  <li><a href="login.php" target="contenido">Login</a></li> <!-- El login -->
  <li><a href="acercade.php" target="contenido" >Acerca de</a></li> <!-- Informacion del sistema -->
</ul>

<iframe src="bienvenida.php" width="100%" height="669px" name="contenido"> <!-- Muestra los target -->
</iframe>
</div>

</head>

<body> <!-- Aqui ira todo lo demas-->

<div class="contenido"> <!-- Muestra lo que esta en los li -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">    
</div>

<?php
	} //Fin el if del codigo php de mas arriba
	if(@$_SESSION['Cargo']==1){ //Si el usuario inicio sesion, muestra esto usando el cargo
	echo '<b>Estas dentro del sistema, profesor/profesora</b>';
	echo '<p class="demo"></p>';
?>

<div id="header">
<iframe src="reloj.php" width="100%" height="48px" name="relojito">
</iframe>

<!-- Muestra contenido de los archivos php-->
<ul class="main-nav">
  <li><a href="bienvenida2.php" target="contenido">Principal</a></li> <!-- Archivo de bienvenida-->
  <li class="dropdown" id="part1"> <!-- Se dividen los reservorios, meter datos-->
    <a href="javascript:void(0)" class="dropbtn">Reservar salon de...</a>
    <div class="dropdown-content" id="drop1">
      <a href="cdt.php" target="contenido">Reservar salon de CDT</a>
	  <a href="diseno.php" target="contenido">Reservar salon de diseño</a>
      <a href="lib.php" target="contenido">Reservar biblioteca</a>
	  <a href="aulavirtual.php" target="contenido">Reservar aula virtual</a>
    </div>
	 </li>
  <li><a href="cerrar.php" target="_top" >Salir</a></li> <!-- Cerrar todo -->
</ul>

<iframe src="bienvenida2.php" style="background: #FFFFFF;" width="100%" height="700px" name="contenido"> <!-- Muestra los target -->
</iframe>
</div>

<?php
	} //Fin el if del codigo php de mas arriba
	if(@$_SESSION['Cargo']==2){ //Si el usuario inicio sesion, muestra esto usando el cargo
	echo '<b>Estas dentro del sistema para empleados del CDT</b>';
	echo '<p class="demo"></p>';
?>

<iframe src="reloj.php" width="100%" height="48px" name="relojito">
</iframe>
<ul class="main-nav">
  <li><a href="bienvenida3.php" target="contenido">Principal</a></li> <!-- Archivo de bienvenida-->
	<li class="dropdown" id="part2"> <!-- Se dividen los reservorios, ver y editar datos-->
	 <a href="javascript:void(0)" class="dropbtn">Ver clases de...</a>
	 <div class="dropdown-content" id="drop2">
	  <a href="cdtclase.php" target="contenido">Ver clases del CDT</a>
	  <a href="disenoclase.php" target="contenido">Ver clases de diseño</a>
	  <a href="libclase.php" target="contenido">Ver clases de la biblioteca</a>
	  <a href="aulavirtualclase.php" target="contenido">Ver clases del aula virtual</a>
     </div>
    </li>
  <li><a href="backup.php" target="contenido" >Hacer un backup</a></li> <!-- Hacer un backup -->
  <li><a href="restaurar.php" target="contenido" >Restaurar base de datos</a></li>
  <li><a href="registrarpersonaadmin.php" target="contenido">Registrar administrador</a></li> <!-- El registro --> 
  <li><a href="cambiar.php" target="contenido" >Cambiar un cargo de usuario</a></li> <!-- Cambiar cargos -->
  <li><a href="cerrar.php" target="_top" >Salir</a></li> <!-- Cerrar todo -->
</ul>

<iframe src="bienvenida3.php" style="background: #FFFFFF;" width="100%" height="700px" name="contenido"> <!-- Muestra los target -->
</iframe>
</div>

</body>

<?php
	} //Fin el if del codigo php de mas arriba
?>

</html> <!-- Final -->