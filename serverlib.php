
<?php
	//include connection file 
	include_once("connection.php");
	
	//define libclase of column
	$columns = array(
		0 =>'nombre', 
		1 => 'materia',
		2 => 'fecha',
		3 => 'fechaemp',
		4 => 'fechater',
		5 => 'numero',
		6 => 'fechainscripcion'
	);
	$error = false;
	$colVal = '';
	$colcdt = $rowId = 0;
	
	$msg = array('status' => !$error, 'msg' => 'Hubo un problema actualizando los datos');

	if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['libclase']) && $_POST['libclase'] >= 0 &&  !$error) {
      $colcdt = $_POST['libclase'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && $_POST['id'] > 0 && !$error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
	
	if(!$error) {
			$sql = "UPDATE reservalib SET ".$columns[$colcdt]." = '".$colVal."' WHERE id='".$rowId."'";
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$msg = array('error' => $error, 'msg' => 'Se actualizaron los datos, recargue la pagina para poder verlo');
	} else {
		$msg = array('error' => $error, 'msg' => 'Hubo un problema actualizando los datos');
	}
	}
	// send data as json format
	echo json_encode($msg);
	
?>
	