<html> <!-- Inicio -->

<?php
 session_start();
 echo @$_SESSION['Cargo']; //Muestra si el usuario inicio o no sesion usando el cargo
 echo '<br></br>';
 echo @$_SESSION['nombre']; //Muestra el nombre del usuario
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

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
<iframe src="reloj.php" width="100%" height="40px" name="relojito">
</iframe>

<!-- Muestra contenido de los archivos php-->
<nav>
        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
                <li><a href="bienvenida.php" target="contenido">Principal</a></li>
                <li><a href="registrarpersona.php" target="contenido">Registrarse</a></li> <!-- El registro -->
                <li><a href="login.php" target="contenido">Login</a></li> <!-- El login -->
               <li><a href="acercade.php" target="contenido" >Acerca de</a></li> <!-- Informacion del sistema -->
            </ul>
</nav>

<iframe src="bienvenida.php" width="100%" height="100%" name="contenido"> <!-- Muestra los target -->
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
	echo '<b>Estas dentro del sistema para profesores</b>';
	echo '<p class="demo"></p>';
?>

<div id="header">
<iframe src="reloj.php" width="100%" height="48px" name="relojito">
</iframe>

<!-- Muestra contenido de los archivos php-->
<nav>
        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
            <li><a href="bienvenida2.php" target="contenido">Principal</a></li> <!-- Archivo de bienvenida-->
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Reservar salon de...</label>
                    <a href="#">Reservar salon de...</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="cdt.php" target="contenido">Reservar salon de CDT</a></li>
                        <li><a href="diseno.php" target="contenido">Reservar salon de diseño</a></li>
                        <li><a href="lib.php" target="contenido">Reservar biblioteca</a></li>
                        <li><a href="aulavirtual.php" target="contenido">Reservar aula virtual</a></li>
                    </ul> 
                </li>
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-2" class="toggle">Reserva de videobeam...</label>
                    <a href="#">Reserva de videobeam...</a>
                    <input type="checkbox" id="drop-2"/>
                    <ul>
                        <li><a href="reservarvideo.php" target="contenido">Hacer una reserva</a></li>
                        <li><a href="reservacionvideo.php" target="contenido">Ver las reservaciones</a></li>
                    </ul>
                </li>
                <li><a href="cerrar.php" target="_top" >Salir</a></li> <!-- Cerrar todo -->
            </ul>
        </nav>

<iframe src="bienvenida2.php" style="background: #FFFFFF;" width="100%" height="100%" name="contenido"> <!-- Muestra los target -->
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

<nav>
        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
            <li><a href="bienvenida3.php" target="contenido">Principal</a></li> <!-- Archivo de bienvenida-->
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Reservar salon de...</label>
                    <a href="#">Reserva de salones...</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="cdtclase.php" target="contenido">Ver clases del CDT</a></li>
                        <li><a href="disenoclase.php" target="contenido">Ver clases de diseño</a></li>
                        <li><a href="libclase.php" target="contenido">Ver clases de la biblioteca</a></li>
                        <li><a href="aulavirtualclase.php" target="contenido">Ver clases del aula virtual</a></li>
                    </ul>
                </li>
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-2" class="toggle">Reserva de videobeam...</label>
                    <a href="#">Reserva de videobeam...</a>
                    <input type="checkbox" id="drop-2"/>
                    <ul>
                        <li><a href="reservarvideo.php" target="contenido">Hacer una reserva</a></li>
                        <li><a href="reservacionvideoedit.php" target="contenido">Ver las reservaciones</a></li>
                    </ul>
                </li>
                <li><a href="backup.php" target="contenido" >Backup</a></li> <!-- Hacer un backup -->
                <li><a href="restaurar.php" target="contenido" >Restaurar base de datos</a></li>
                <li><a href="registrarpersonaadmin.php" target="contenido">Registrar administrador</a></li> <!-- El registro --> 
                <li><a href="cambiar.php" target="contenido" >Cambiar cargo</a></li> <!-- Cambiar cargos -->
                <li><a href="cerrar.php" target="_top" >Salir</a></li> <!-- Cerrar todo -->
            </ul>
        </nav>

<iframe src="bienvenida3.php" style="background: #FFFFFF;" width="100%" height="100%" name="contenido"> <!-- Muestra los target -->
</iframe>
</div>

</body>

<?php
	} //Fin el if del codigo php de mas arriba
?>

</html> <!-- Final -->