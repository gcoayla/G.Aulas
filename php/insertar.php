<?php 
/***************************************************************/
/* Controlador que inserta una nueva reserva realizada por el profesor, revisando primero si el horario no está ocupado */
/***************************************************************/

$usuario = $_COOKIE['idsesion'];
$curso = $_POST['curso'];
$aula = $_POST['aula'];
$tiempoi = $_POST['tiempoi'];
$tiempof = $_POST['tiempof'];

$fecha = $_POST['fecha'];
$dia   = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio = substr($fecha,0,4);
$semana = date('W',  mktime(0,0,0,$mes,$dia,$anio));
$dian = date('w',  mktime(0,0,0,$mes,$dia,$anio));

$desc = $_POST['desc'];
$mysqli = new mysqli("localhost","root","","horarios");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
	$solapa = 0;

	$result = $mysqli -> query("SELECT r.hora_inicio, r.hora_fin, r.dia, r.semana_inicio, r.semana_fin 
FROM reserva r WHERE (('".$aula."' = codigo_aula) AND (".$dian." = dia) AND (('".$tiempoi."' >= hora_inicio AND '".$tiempoi."' < hora_fin) OR ('".$tiempof."' > hora_inicio AND '".$tiempof."' <= hora_fin) OR ('".$tiempoi."' < hora_inicio and '".$tiempof."' > hora_fin)) AND (".$semana."  BETWEEN semana_inicio AND semana_fin))");

	if ($result->num_rows > 0) {
        echo "<p>Horario ocupado</p>";
	}else{
        $query1="INSERT INTO reserva (hora_inicio, hora_fin, semana_inicio, semana_fin, dia, descripcion, codigo_usuario, codigo_aula, codigo_curso) VALUES('".$tiempoi."','".$tiempof."',".$semana.",".$semana.",".$dian.",'".$desc."','".$usuario."','".$aula."', '".$curso."')";
        $res = $mysqli->query($query1);
        if ($res){
            echo "<p>Ingresado Correctamente</p>";
        }else{
            echo "<p>Error en la inserción</p>";
        }
	}

?>
