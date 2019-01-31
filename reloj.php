<html>

<head>

<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->

<style>    
body{background-image: url("imagenes/fondo_une.jpg")}
</style>

<script type="text/javascript"> 
function date_time(id) 
{
        date = new Date; <!-- Obtiene el dia -->
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado');
        h = date.getHours();
        if(h<10) <!-- Si la hora es menor a 10, se le anade un 0 a la izquierda -->
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10) <!-- Si los minutos son menores a 10, se le anade un 0 a la izquierda -->
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10) <!-- Si los segundos son menores a 10, se le anade un 0 a la izquierda -->
        {
                s = "0"+s;
        }
        result = ''+days[day]+','+' '+d+' '+'de '+months[month]+' '+'del'+' '+year+''+', '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
</script>
</head>

<body>
	   <center><span id="date_time"></span></center>
           <script type="text/javascript">window.onload = date_time('date_time');</script>
</body>
</html>