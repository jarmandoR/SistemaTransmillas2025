<?php
require("login_autentica.php");
include("declara.php");

@$accion=$_REQUEST["accion"];
$fechatiempo=date("Y-m-d H:i:s");
$fecha=date("Y-m-d");
$nombre=$_POST["nombre"];
$fecha=$_POST["fecha"]; // Captura el archivo
$id=$_POST["idhv"];


				
					if($_FILES["documento"]!=''){
			
                        if (is_uploaded_file($_FILES['documento']['tmp_name'])){
                            $nombreArchivo = $_FILES["documento"]["name"];
                            $documento = date("Y-m-d-H-i-s").$nombreArchivo;
                        
                            move_uploaded_file($_FILES['documento']['tmp_name'], "./img_docHVC/".$documento);
                        }else{
                            $documento = "";
                        }
					}
                    $sql2="INSERT INTO `doc_hoja_clientes`(`docl_nombre`, `docl_documento`, `docl_idhvc`, `docl_fecha_venc`) VALUES ('$nombre','$documento','$id','$fecha')";
					$vinculo=$DB->Executeid($sql2);
					if ($vinculo) {
                        echo"ok";
                    }else{
                        echo"No";
                    }
						

?>