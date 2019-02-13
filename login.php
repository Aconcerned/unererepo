<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Inicio -->
<head> <!-- Logo, menu, el css, etc -->

<link rel="stylesheet" href="estilos\login1.css">

<style>
      body {
      background-image:url(imagenes/fondo_une.jpg);
      }
</style>

</head>

<body> <!-- Aqui ira todo lo demas-->
<center><h1>Bienvenido al formulario de iniciar sesión</h1></center>
<h3>Nota: Es sensible a mayúsculas y minúsculas, por favor escriba de manera consistente. Por ejemplo: "hola" no es igual a "HOLA" u "HoLa"</h3>

<br></br>
<div id="caplock" style="none">El bloqueo de mayúsculas está activado</div>
  
  <form method="POST" action="revisar.php"> <!-- Se comunica con revisar.php que hace el login en si-->
    <label for="uname"><b>Nombre de usuario</b></label>
    <br></br>
    <input type="text" onKeyPress="isMayus(event)"  placeholder="Escriba su nombre de usuario" name="nombre" id="nombre" required></input>
    <br></br>

    <label for="psw"><b>Clave</b></label>
    <br></br>
    <input type="password" onKeyPress="isMayus(event)"  placeholder="Escriba su clave de usuario" name="clave" id="clave" required></input>
    <br></br>

<input type="submit" id="Entrar" onclick="MyFunction()" value="Entrar"></input>

<div class="container" style="background-color:#f1f1f1">
<button type="Reset" id="reset"  onclick="MyFunction()">Cancelar</button>
 </div>

<script type="text/javascript">
  function MyFunction() { 
	var audio = new Audio('audio/click.mp3');
    audio.play();
 }

    var x = document.getElementById("caplock"); //Detecta si esta escribiendo en mayusculas y muestra esto o no
    function isMayus(input){
    kCode=input.keyCode?input.keyCode:input.which;
    sKey=input.shiftKey?input.shiftKey:((kCode==16)?true:false);

    if(((kCode>=65&&kCode<=90)&&!sKey)||((kCode>=97&&kCode<=122)&&sKey))
    {
        x.style.display = "block";
    }else{ 
        x.style.display = "none";
    }
}
</script>
  
</form> <!-- Final de la forma -->

</body>

</html> <!-- Final -->
