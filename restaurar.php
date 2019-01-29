<html>

<head>
<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->
<style>
#backup_file,input[type=submit]{width:95 px;background-color:teal}#backup_file{padding:12px 20px;margin:8px 0;display:inline-block;border:1px solid #ccc;box-sizing:border-box}input[type=submit]{padding:14px 20px;border:3px solid #000}body{background-image:url(imagenes/fondo_une.jpg)}
</style>   
</head>

<body>

<?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>

<center><form method="post" action="restaure.php" enctype="multipart/form-data" id="frm-restore">
    <div class="form-row">
        <h2>Seleccione el archivo</h2>
        <div>
            <input type="file" name="backup_file" class="input-file" />
        </div>
    </div>
    <div>
        <input type="submit" name="restore" value="Restaurar"
            class="btn-action" />
    </div>
</form></center>

</body>

</html>