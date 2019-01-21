<?php
	//include connection file 
	include_once("connection.php");
	
	//define cdtclase of column
	$columns = array(
		0 =>'nombre', 
		1 => 'email',
		2 => 'materia',
		3 => 'Cargo'
	);
	$error = false;
	$colVal = '';
	$colcambiar = $rowId = 0;
	
	$msg = array('status' => !$error, 'msg' => 'Hubo un problema actualizando los datos');

	if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['cambiar']) && $_POST['cambiar'] >= 0 &&  !$error) {
      $colcambiar = $_POST['cambiar'];
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
			$sql = "UPDATE usuarios SET ".$columns[$colcambiar]." = '".$colVal."' WHERE id='".$rowId."'";
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$msg = array('error' => $error, 'msg' => 'Se actualizaron los datos, recargue la pagina para poder verlo');
	} else {
		$msg = array('error' => $error, 'msg' => 'Hubo un problema actualizando los datos');
	}
	}
	// send data as json format
	echo json_encode($msg);
	
?>