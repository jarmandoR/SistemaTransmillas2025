<!DOCTYPE html>
<html>

<head>
<script>

</script>
</head>
<body>

 <?php 

 $fechaactual=date("Y-m-d");
 $nivel_acceso=$_SESSION['usuario_rol'];
 $id_sedes=$_SESSION['usu_idsede'];

 if($nivel_acceso==1){
	if($param35!=''){   $conde2=""; }  

}
else {	
	$param35=$id_sedes;
	
}
echo "</tr>";
$FB->titulo_azul1("Documentos clienntes",9,0,7);  
echo "</tr>";



$FB->llena_texto("Nombre",1, 9, $DB, "", "", "",1,0);
$FB->llena_texto("Fecha de vencimiento:", 3, 10, $DB, "", "", "", 17, 0);
$FB->llena_texto("Documentos:", 2, 6, $DB, "", "", "",1, 0);


echo '<input type="hidden" name="param4" id="param4" value="'.$idhojadevida.'">';


echo "<tr><td><button type='button' class='btn btn-success' onclick='enviar_formulario()' >Gurdar</button></td></tr>";
$FB->titulo_azul1("Nombre :",1,0,7);
$FB->titulo_azul1("Fecha de vencimiento ",1,0,0); 
$FB->titulo_azul1("Documento",1,0,0); 
$FB->titulo_azul1("Eliminar",1,0,0); 
echo "</tr>";
// $FB->titulo_azul1("Imagenes de Documentos",9,0,7);  
// echo "</tr>";

echo "<tr class='text'><td>CAMARA DE COMERCIO:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 1, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

echo "<tr class='text'><td>Rut:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 2, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

echo "<tr class='text'><td>Poliza:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 3, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

echo "<tr class='text'><td>Contrato:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 4, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

echo "<tr class='text'><td>Certificacion cuenta bancaria:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 5, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

echo "<tr class='text'><td>Cedula representante legal:</td>";
echo "<td></td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 6, 35, 'Ver Imagen');
echo "<td></td>";
echo "</tr>"; 

// $FB->llena_texto("Cedula representante legal:", 106, 6, $DB, "", "", "",1, 0);
// echo "<td></td>";
// echo $LT->llenadocs3($DB1, "hojadevidacliente",$id_p, 6, 35, 'Ver Imagen');
// echo "<td><button type='submit' class='btn btn-success' onclick='enviar_formulario(param106)' >Subir</button></td>";
// echo "<td></td>";
// echo "</tr>"; 

echo '<input type="hidden" name="param7" id="param7" value="'.$idhojadevida.'">';
echo '<input type="hidden" name="param8" id="param8" value="1">';
echo '<input type="hidden" name="param8" id="foto" value="">';



?> 
<script>

function enviar_formulario() {
    let formData = new FormData(); // Crea un objeto FormData para enviar los datos

    // Capturar valores de los inputs
    formData.append("nombre", document.getElementById("param1").value);
    formData.append("documento", document.getElementById("param2").files[0]); // Captura el archivo
    formData.append("fecha", document.getElementById("param3").value);
    formData.append("idhv", document.getElementById("param4").value);

    // Enviar con fetch al PHP
    fetch("new_documentcli.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Recibir respuesta
    .then(data => {
        alert(data);
		         // 🔹 LIMPIAR LOS CAMPOS DESPUÉS DE SUBIR
				row.find(".nombre").val(""); // Limpiar el campo de texto
                row.find(".fecha").val(""); // Limpiar el input file
	
    })
    .catch(error => console.error("Error:", error));
}

</script>
</body>
</html>
