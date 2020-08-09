<?php 
/***************************************************************/
/* Controlador que realiza el login de alumnos o profesores */
/***************************************************************/
$mysqli = new mysqli("localhost","root","","horarios");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$qry = "select u.correo 'correo', u.contrasenia 'contra',u.codigo 'codigo',u.tipo 'tipo'
		from usuario u
		where u.correo='".$_POST['nombre']."'and u.contrasenia = '".$_POST['contrasena']."';";
$res = $mysqli->query($qry);
if ($res->num_rows > 0){
    while ($row = $res->fetch_assoc()){
        $tipou=$row['tipo'];
        $codigo=$row['codigo'];
        echo "<h3 id='datos' exito='1' tipou='".$tipou."' codigo='".$codigo."'>Logeando</h3>";
        
    }
} else {
    echo "<h3 id='datos' exito='0'>Datos erroneos</h3>";
}
mysqli_close($mysqli);
?>