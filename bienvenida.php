<html>
<head>
<link rel="stylesheet" href="estilos\bienvenido.css">

<style>
body{
background-image: url("imagenes/fondo_une.jpg")
}
</style>

<center><h1>Bienvenido al sistema de reservación para clases en el CDT</h1></center> 
<center><h2>No ha iniciado sesión, haga click en el boton correspondiente (Login), para poder entrar</h2></center>
<h3><b>Nota para los profesores:</b> Esta sección de la página web es solo compatible con navegadores que soporten html5, como las versiones mas nuevas de Edge, Chrome, Opera y Firefox. Si intenta usar otro navegador o está desactualizado, tendrá problemas colocando datos como la fecha y la hora</h3>
<br></br>

</head>

<body>
<p>Información de su navegador (Lea los últimos dos datos):</p>
<b><p id="demo"></p></b>

<p><b>Versiones recomendadas:</b> Chrome 25 en adelante, Firefox 57 en adelante, Opera 10 en adelante, Edge 12 en adelante</p>
<div style="text-align: center;"><a href="https://browser-update.org/es/update-browser.html" target="_blank">Haga click para ver si necesita actualizar su navegador</a></div> 

<br></br>
<div style="text-align: center;"><a href="https://web.archive.org/web/20160522221017/http://hipertextual.com:80/archivo/2013/05/entendiendo-html5-guia-para-principiantes" target="_blank">Explicación de lo que es HTML5</a></div> 

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

</body>
</html>