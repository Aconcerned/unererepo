<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<head>
<link rel="stylesheet" href="estilos\bienvenido.css">

<style>
body{background-image:url(imagenes/fondo_une.jpg)}
</style>

</head>

<body>

<center><h1>Bienvenido al sistema de reservacion para clases en el CDT<h1/></center>

<h3>Instrucciones para su uso:</h3>
<p><b>Registrar un usuario:</b> Coloque el nombre de usuario, una clave, el email y la cedula de identidad.</p>
<p><b>Ver y editar datos:</b> Vaya a la tabla correspondiente, haga click en un campo y escriba alli, luego haga click fuera de la tabla para que se complete el proceso.</p>
<p><b>Backup:</b> Solo haga click en el botón, el respaldo se guardara en una carpeta llamada backups en formato .sql</p>
<br></br>

<p>Su navegador actual es (Lea los últimos dos datos):</p>
<b><p id="demo"></p></b>

<p>Si tiene problemas cargando algunos campos como el de fecha y hora, intente actualizar su navegador a la version mas nueva</p>
<div style="text-align: center;"><a href="https://browser-update.org/es/update-browser.html" target="_blank">Haga click para ver si necesita actualizar su navegador</a></div> 

<script>
document.getElementById("demo").innerHTML = navigator.userAgent; <!-- Da el nombre del navegador y el sistema operativo -->
</script>

<div class="img__wrap">
  <img src="imagenes/HTML5.png" alt="HTML5 POWERED" height="35 px" aling="left">
  <p class="img__description">HTML5 POWERED</p>
</div>

<div class="img__wrap">
  <img src="imagenes/jquery.png" alt="JQUERY POWERED" height="35 px" aling="left">
  <p class="img__description">JQUERY POWERED</p>
</div>

<script>
!function(o){if(void 0===o)throw new Error("window is undefined");o.onhashchange=function(){"!"!==o.location.hash&&(o.location.hash="!")},o.onload=function(){o.location.href+="#",o.setTimeout(function(){o.location.href+="!"},50),document.body.onkeydown=function(o){var n=o.target.nodeName.toLowerCase();8===o.which&&"input"!==n&&"textarea"!==n&&o.preventDefault(),o.stopPropagation()}}}(window);
</script>

</body>

</html>