<html>

<head>

<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->

<style>    
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

<script type="text/javascript"> 
function date_time() {

date = new Date();
year = date.getFullYear();

month = date.getMonth();
months = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
d = date.getDate();
day = date.getDay();
days = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado');
var session = "AM";

h = ("0" + date.getHours()).slice(-2) -1; 
m = ("0" + date.getMinutes()).slice(-2);
s = ("0" + date.getSeconds()).slice(-2);

if (h >= 12) {
    h = h - 11;
    session = "PM";
}

result = `${days[day]}, ${d} de ${months[month]} del  ${year},  ${h}:${m}:${s} ${session}`;


time  = date.toLocaleString('en-US', { timeZone: 'EST', hour: 'numeric', minute: 'numeric', second: 'numeric',hour12: true });
result2 = `Hora en UTC-4: ${days[day]}, ${d} de ${months[month]} del  ${year}, ${time}`;

document.getElementById("date_time2").innerText = result2;
setTimeout(date_time, '1000');
return true;
}
</script>
</head>

<body>
	  
       <center><span id="date_time2"></span></center>
           <script type="text/javascript">window.onload = date_time('date_time');</script>
</body>
</html>