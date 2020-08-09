<?php 

/***************************************************************/
/* Controlador que inicializa el formulario de reserva según la id del profesor */
/***************************************************************/

$usuario = $_COOKIE['idsesion'];
$mysqli = new mysqli("localhost","root","","horarios");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$qry = "select r.codigo_curso 'codCurso',
			  c.nombre 'cursoNombre', c.tipo 'cursoTipo', c.grupo 'cursoGrupo'
		from reserva r
		inner join curso c on c.codigo = r.codigo_curso
		inner join usuario u on u.codigo = r.codigo_usuario
		where u.codigo = '".$usuario."'
		group by r.codigo_curso;";
$res = $mysqli->query($qry);
$cont=0;
if ($res){
echo '<option selected value="libre">Libre</option>';
while ($row = $res->fetch_assoc()){
				$codigo_curso = $row['codCurso'];
				$cursonombre = $row['cursoNombre'];
				$tipo = $row['cursoTipo'];
				$grupo = $row['cursoGrupo'];
            echo '<option value="'.$codigo_curso.'">'.$cursonombre.' '.strtoupper($tipo).'-'.strtoupper($grupo).'</option>';
}
} else {
  echo '<option selected value="libre">Libre</option>';
}
mysqli_close($mysqli);
?>