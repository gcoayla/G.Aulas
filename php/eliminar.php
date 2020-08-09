<?php 
/***************************************************************/
/* Controlador que elimina una reserva */
/***************************************************************/

    $resultado = $_POST['codigo']; 
    $mysqli = new mysqli("localhost","root","","horarios");
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $qry = "delete from reserva where codigo=".$resultado.";";
    if ($mysqli->query($qry) === TRUE) {
      echo "Borrado existoso";
    } else {
      echo "Borrado fallido" . $mysqli->error;
    }
    
?>