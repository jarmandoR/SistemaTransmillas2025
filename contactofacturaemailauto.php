<?php 
require("login_autentica.php"); 
$id_ciudad= $_SESSION['usu_idsede'];
$id_usuario= $_SESSION['usuario_id'];
@$tipoguia=$_REQUEST["tipoguia"];
@$registros=$_REQUEST["registros"];
$id_nombre=$_SESSION['usuario_nombre'];
$DB = new DB_mssql;
$DB->conectar();
$DB1 = new DB_mssql;
$DB1->conectar();


$fechaHoraActual = date('Y-m-d H:i:s');






$tipo=$_POST['tipo'];
$idcon=$_POST['idcon']; 

                $sql="UPDATE `contactofacturacion` SET `con_correo_automatico`='$tipo' WHERE idcontactofacturacion ='$idcon'  ";
               
                if ( $DB1->Execute($sql)) {
                   // Ejemplo simple de respuesta
                    echo json_encode([
                        "status" => "ok"
                    ]);
                }else {
                    echo json_encode([
                        "status" => "error"
                    ]);
                }
