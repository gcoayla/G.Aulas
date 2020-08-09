<?php 
/***************************************************************/
/* Controlador que muestra las reservas realizadas por el profesor */
/***************************************************************/
$usuario = $_COOKIE['idsesion'];
$mysqli = new mysqli("localhost","root","","horarios");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$qry = "select r.codigo 'Cod', r.codigo_curso 'codCurso', r.hora_inicio 'hInicio', r.hora_fin 'hFin',r.dia 'dia',r.semana_inicio 'fecha',r.codigo_aula 'aula',r.descripcion 'desc',
        u.nombre 'Nombre', u.apellidos 'Apellidos'
		from reserva r
        inner join usuario u on u.codigo = r.codigo_usuario
		where r.codigo_usuario= '".$usuario."' and r.descripcion != 'Oficial'
		order by r.semana_inicio;";
$res = $mysqli->query($qry);
$cont=0;
if ($res->num_rows > 0){
while ($row = $res->fetch_assoc()){
                $reservaid = $row['Cod'];
				$codigo_curso = $row['codCurso'];
				$hora_inicio = $row['hInicio'];
				$hora_fin = $row['hFin'];
				$dia = $row['dia'];
				$fecha = $row['fecha'];
				$aula = $row['aula'];
				$desc = $row['desc'];
                $nombre = $row['Nombre'];
				$apellidos = $row['Apellidos'];
            if($cont==0){
                echo '<h3 id="titres">Reservas de '.$nombre.' '.$apellidos.'</h3>';
                $cont=1;
            }
			echo '<div class="reservabox">
            <div class="terce">
                <h4>Dia:';
            if($dia==1){
                echo 'Lunes';
            }else if($dia==2){
                echo 'Martes';
            }else if($dia==3){
                echo 'Miercoles';
            }else if($dia==4){
                echo 'Jueves';
            }else if($dia==5){
                echo 'Viernes';
            }
            echo '</h4>
                <h4>Hora:'.substr($hora_inicio, 0, 5).'-'.substr($hora_fin, 0, 5).'</h4>
            </div>
            <div class="terce">
                <h4>Fecha:'.$fecha.'</h4>
                <h4>Curso:'.strtoupper($codigo_curso).'</h4>
            </div>
            <div class="terce">
                <h4>Aula:'.$aula.'</h4>
                <p>'.$desc.'</p>
            </div>
            <div class="terce">
                <div class="bt-elim" onclick="eliminar('.$reservaid.')">ELIMINAR</div>
            </div>
        </div>';
}
} else {
  echo "<h3>No se encontraron resultados</h3>";
}
mysqli_close($mysqli);
?>