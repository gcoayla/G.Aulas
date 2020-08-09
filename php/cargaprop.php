<?php 
/***************************************************************/
/* Controlador que carga en el horario los horarios propios de cada profesor */
/***************************************************************/
$usuario = $_COOKIE['idsesion'];
$fecha=$_COOKIE['fechaselec'];
$dia   = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio = substr($fecha,0,4);
$semana = date('W',  mktime(0,0,0,$mes,$dia,$anio));
$mysqli = new mysqli("localhost","root","","horarios");

$diaSemana=date("w",mktime(0,0,0,$mes,$dia,$anio));
if($diaSemana==0)
    $diaSemana=7;
$lunes=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+1,$anio));
$martes=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+2,$anio));
$miercoles=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+3,$anio));
$jueves=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+4,$anio));
$viernes=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+5,$anio));

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$qry = "select r.codigo_curso 'codCurso', r.hora_inicio 'hInicio', r.hora_fin 'hFin',r.dia 'dia', 
			  c.nombre 'cursoNombre', c.tipo 'cursoTipo', c.grupo 'cursoGrupo',c.acronimo 'cursoAcro', 
			  a.codigo 'aulaCod',
			  u.nombre 'userNombre', u.apellidos 'userApellidos', u.correo 'userCorreo'
		from reserva r
		inner join curso c on c.codigo = r.codigo_curso
		inner join usuario u on u.codigo = r.codigo_usuario
		inner join aula a on a.codigo = r.codigo_aula
		where u.codigo = '".$usuario."' and 
			((r.semana_inicio<='".$semana."' and r.semana_fin>'".$semana."') or r.semana_inicio between ".$semana." and ".$semana.")
		order by r.dia, r.hora_inicio;";

$res = $mysqli->query($qry);
if ($res){
    echo '<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
                    <div class="cd-schedule__timeline">
                      <ul>
                        <li><span>07:00</span></li>
                        <li><span>07:50</span></li>
                        <li><span>08:50</span></li>
                        <li><span>09:40</span></li>
                        <li><span>10:40</span></li>
                        <li><span>11:30</span></li>
                        <li><span>12:20</span></li>
                        <li><span>13:10</span></li>
                        <li><span>14:00</span></li>
                        <li><span>14:50</span></li>
                        <li><span>15:50</span></li>
                        <li><span>16:40</span></li>
                        <li><span>17:40</span></li>
                        <li><span>18:50</span></li>
                        <li><span>19:20</span></li>
                        <li><span>20:20</span></li>
                        <li><span>21:00</span></li>
                      </ul>
                    </div>

                    <div class="cd-schedule__events" id="horariogeneral">';
    echo '<ul><li class="cd-schedule__group"><div class="cd-schedule__top-info"><span>Lunes - '.$lunes.'</span></div><ul>';
	while ($row = $res->fetch_assoc()){
	$codigo_curso = $row['codCurso'];
	$hora_inicio = $row['hInicio'];
	$hora_fin = $row['hFin'];
	$curso_nombre = $row['cursoNombre'];
	$curso_tipo = $row['cursoTipo'];
	$curso_grupo = $row['cursoGrupo'];
	$aula_codigo = $row['aulaCod'];
    $acronimo = $row['cursoAcro'];
    $dia = $row['dia'];
    if($dia==1){
        echo  '<li class="cd-schedule__event">
			  <a data-start="'.substr($hora_inicio, 0, 5).'" data-end="'.substr($hora_fin, 0, 5).'" data-content="'.$codigo_curso.'" data-event="event-'.$dia.'" href="#0">
			    <em class="cd-schedule__name">'.$acronimo.' - '. $curso_tipo.' - '. $curso_grupo.'-'. $aula_codigo.'</em>
			  </a>
			</li>';
    }
    }
    $res = $mysqli->query($qry);
    echo '</ul></li><li class="cd-schedule__group"><div class="cd-schedule__top-info"><span>Martes - '.$martes.'</span></div><ul>';
    while ($row = $res->fetch_assoc()){
	$codigo_curso = $row['codCurso'];
	$hora_inicio = $row['hInicio'];
	$hora_fin = $row['hFin'];
	$curso_nombre = $row['cursoNombre'];
	$curso_tipo = $row['cursoTipo'];
	$curso_grupo = $row['cursoGrupo'];
	$aula_codigo = $row['aulaCod'];
    $acronimo = $row['cursoAcro'];
    $dia = $row['dia'];
    if($dia==2){
        echo  '<li class="cd-schedule__event">
			  <a data-start="'.substr($hora_inicio, 0, 5).'" data-end="'.substr($hora_fin, 0, 5).'" data-content="'.$codigo_curso.'" data-event="event-'.$dia.'" href="#0">
			    <em class="cd-schedule__name">'.$acronimo.' - '. $curso_tipo.' - '. $curso_grupo.'-'. $aula_codigo.'</em>
			  </a>
			</li>';
    }
    }
    $res = $mysqli->query($qry);
    echo '</ul></li><li class="cd-schedule__group"><div class="cd-schedule__top-info"><span>Miercoles - '.$miercoles.'</span></div><ul>';
    while ($row = $res->fetch_assoc()){
	$codigo_curso = $row['codCurso'];
	$hora_inicio = $row['hInicio'];
	$hora_fin = $row['hFin'];
	$curso_nombre = $row['cursoNombre'];
	$curso_tipo = $row['cursoTipo'];
	$curso_grupo = $row['cursoGrupo'];
	$aula_codigo = $row['aulaCod'];
    $acronimo = $row['cursoAcro'];
    $dia = $row['dia'];
    if($dia==3){
        echo  '<li class="cd-schedule__event">
			  <a data-start="'.substr($hora_inicio, 0, 5).'" data-end="'.substr($hora_fin, 0, 5).'" data-content="'.$codigo_curso.'" data-event="event-'.$dia.'" href="#0">
			    <em class="cd-schedule__name">'.$acronimo.' - '. $curso_tipo.' - '. $curso_grupo.'-'. $aula_codigo.'</em>
			  </a>
			</li>';
    }
    }
    $res = $mysqli->query($qry);
    echo '</ul></li><li class="cd-schedule__group"><div class="cd-schedule__top-info"><span>Jueves - '.$jueves.'</span></div><ul>';
    while ($row = $res->fetch_assoc()){
	$codigo_curso = $row['codCurso'];
	$hora_inicio = $row['hInicio'];
	$hora_fin = $row['hFin'];
	$curso_nombre = $row['cursoNombre'];
	$curso_tipo = $row['cursoTipo'];
	$curso_grupo = $row['cursoGrupo'];
	$aula_codigo = $row['aulaCod'];
    $acronimo = $row['cursoAcro'];
    $dia = $row['dia'];
    if($dia==4){
        echo  '<li class="cd-schedule__event">
			  <a data-start="'.substr($hora_inicio, 0, 5).'" data-end="'.substr($hora_fin, 0, 5).'" data-content="'.$codigo_curso.'" data-event="event-'.$dia.'" href="#0">
			    <em class="cd-schedule__name">'.$acronimo.' - '. $curso_tipo.' - '. $curso_grupo.'-'. $aula_codigo.'</em>
			  </a>
			</li>';
    }
    }
    $res = $mysqli->query($qry);
    echo '</ul></li><li class="cd-schedule__group"><div class="cd-schedule__top-info"><span>Viernes - '.$viernes.'</span></div><ul>';
    while ($row = $res->fetch_assoc()){
	$codigo_curso = $row['codCurso'];
	$hora_inicio = $row['hInicio'];
	$hora_fin = $row['hFin'];
	$curso_nombre = $row['cursoNombre'];
	$curso_tipo = $row['cursoTipo'];
	$curso_grupo = $row['cursoGrupo'];
	$aula_codigo = $row['aulaCod'];
    $acronimo = $row['cursoAcro'];
    $dia = $row['dia'];
    if($dia==5){
        echo  '<li class="cd-schedule__event">
			  <a data-start="'.substr($hora_inicio, 0, 5).'" data-end="'.substr($hora_fin, 0, 5).'" data-content="'.$codigo_curso.'" data-event="event-1" href="#0">
			    <em class="cd-schedule__name">'.$acronimo.' - '. $curso_tipo.' - '. $curso_grupo.'-'. $aula_codigo.'</em>
			  </a>
			</li>';
    }
    }
    echo '</ul></li></ul></div>

                    <div class="cd-schedule-modal">
                      <header class="cd-schedule-modal__header">
                        <div class="cd-schedule-modal__content">
                          <span class="cd-schedule-modal__date"></span>
                          <h3 class="cd-schedule-modal__name"></h3>
                        </div>

                        <div class="cd-schedule-modal__header-bg"></div>
                      </header>

                      <div class="cd-schedule-modal__body">
                        <div class="cd-schedule-modal__event-info"></div>
                        <div class="cd-schedule-modal__body-bg"></div>
                      </div>

                      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
                    </div>

                    <div class="cd-schedule__cover-layer"></div>
                  </div>';
} else {
  echo "<h3>No se encontraron resultados</h3>";
}
mysqli_close($mysqli);
?>