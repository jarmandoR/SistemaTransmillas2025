<?php
require("login_autentica.php"); //coneccion bade de datos

$id_nombre=$_SESSION['usuario_nombre'];
$id_usuario=$_SESSION['usuario_id'];
$DB1 = new DB_mssql;
$DB1->conectar();
$DB = new DB_mssql;
$DB->conectar();

$fecha=date('Y-m-d');
//obtenemos el resultado
$sql1="SELECT  `asi_idpromotor`, asi_usercom,usu_celular   FROM `asignaciondinero` inner join usuarios on asi_idpromotor=idusuarios WHERE idasignaciondinero>0 and asi_tipo in ('Transpaso Dinero','Asignar Dinero') and asi_idpromotor='$id_usuario' and asi_fecha like '$fecha%' ORDER BY asi_fecha desc";
$DB1->Execute($sql1); 


// Verifica si hay resultados
if (mysqli_num_rows($DB1->Consulta_ID) > 0) {
    while ($rw1 = mysqli_fetch_row($DB1->Consulta_ID)) {
        if (!is_null($rw1[1])) {
            $datos = "ok";
        } else {
            $datos = "Tienes dinero pendiente por aceptar";
            $numero=$rw1[2];
        }
    
    }
} else {
    $sql2="SELECT  usu_celular   FROM `usuarios`  WHERE idusuarios='$id_usuario'";
    $DB1->Execute($sql2); 
    $rw2 = mysqli_fetch_row($DB1->Consulta_ID);
    $numero=$rw2[0];
    $datos = "No tienes dinero comunicate con la oficina";
    

}



//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Devolvemos el array pasado a JSON como objeto
$datos = [
    "mensaje" => "$datos",
    "numguia" => "$id_nombre",
    "telefono" => "$numero",
    "tipo" => "32",
    "idservi" => "0"
    
  ];
  
  echo json_encode($datos);

?>

