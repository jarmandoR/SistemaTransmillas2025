<?php 

// include("cabezote1.php"); 





$id_usuario=$_SESSION['usuario_id'];
$id_nombre=$_SESSION['usuario_nombre'];
$nivel_acceso=$_SESSION['usuario_rol'];
$rol_nombre=$_SESSION['rol_nombre'];
$id_sedes=$_SESSION['usu_idsede'];
$DB = new DB_mssql;
$DB->conectar();
$DB1 = new DB_mssql;
$DB1->conectar();
$FB = new funciones_varias;
$QL = new sql_transact;
$LT = new llenatablas;
$param_edicion=1; $rcrear=1;  


$DB_m = new DB_mssql;
$DB_m->conectar();
$DB_m1 = new DB_mssql;
$DB_m1->conectar();
$DB_m2 = new DB_mssql;
$DB_m2->conectar();
?>
<!DOCTYPE html>
<html>
<head>


<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/paginar.css" rel="stylesheet" type="text/css" />
<link href="css/chats.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/toats.css">
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
 -->
 <!-- <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />  -->

<script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
<script language="JavaScript" type="text/javascript" src="js/consultas_js.js"></script>


<script language="JavaScript" type="text/javascript" src="js/jquery.min.js"></script> 
<!-- <script language="JavaScript" type="text/javascript" src="js/bootbox.min.js"></script> 
 --><script language="JavaScript" type="text/javascript" src="js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/AdminLTE/app.js"></script> 


<!-- <link href="dist/css/select2.min.css" rel="stylesheet" />
<link href="dist/css/select2-bootstrap.css" rel="stylesheet">
<script src="dist/js/select2.min.js"></script> -->
<script type="text/javascript">
/*       $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
  </script>
<script>expanded = false;</script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript">



// function popup (URL){ window.open(URL,"ventana1","width=1000, height=600, scrollbars=yes, menubar=no, location=no, resizable=no") } 
// function popup2 (URL){ window.open(URL,"ventana1","width=1200, height=650, scrollbars=yes, menubar=no, location=no, resizable=no") } 
 </script>	
<!-- // <link rel="shortcut icon" href="images/favicon.ico" />
// <title>Transmillas</title >
// <META HTTP-EQUIV="Cache-Control" CONTENT ="no-cache">
// <meta charset="utf-8">
// <meta http-equiv="X-UA-Compatible" content="IE=edge">
// <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
// </head><body> -->






























<?php

$id_sedes=$_SESSION['usu_idsede'];
$conde1="";
if(isset($_REQUEST["ord"])){ $ord=$_REQUEST["ord"]; } else { $ord="1"; } 
if(isset($_REQUEST["asc"])){ $asc=$_REQUEST["asc"]; } else {$asc="ASC"; } $asc2="ASC"; if($asc=="ASC"){ $asc2="DESC";}
?>
	<style type="text/css">
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#ecedef;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
            .nav li a:hover {
				background-color:#f0f0f0;
			}
						
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}		 
             
		</style>




