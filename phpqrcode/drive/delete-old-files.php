<?php

exit;

require_once './config/config.php';
require '../connection/variables.php';

$database = \DBController\DatabaseFactory::getInstance($host, $bd, $user, $pass);

$date = date('Y-m-01');

//$rs = $database->select("d.*", "documentos d JOIN backup_archivos b ON d.iddocumentos = b.documento_id AND b.tabla = 'documentos'", "d.doc_fecha < '{$date}' AND b.procesado = 1");
//$data = $rs->getResultToArray();
//$rs->free();
//
//$i = 0;
//
//foreach ($data as $rec) {
//    $filePath = APPLICATION_BASE_PATH . '/' . $rec['doc_ruta'];
//
//    if (file_exists($filePath)) {
//        echo ++$i, ' ----> ', $rec['doc_fecha'], ' : ', $filePath . '<br />';
//    }
//}
//$rs = $database->select("i.*", "imagenguias i JOIN backup_archivos b ON i.idimagenguias = b.documento_id AND b.tabla = 'guias'", "i.ima_fecha < '{$date}' AND b.procesado = 1");
//$data = $rs->getResultToArray();
//$rs->free();
//
//$i = 0;
//
//foreach ($data as $rec) {
//    $filePath = APPLICATION_BASE_PATH . '/' . $rec['ima_ruta'];
//
//    if (file_exists($filePath)) {
//        echo ++$i, ' ----> ', $rec['ima_fecha'], ' : ', $filePath . '<br />';
//    }
//}

$rs = $database->select("n.*", "noticia n JOIN backup_archivos b ON n.idnoticia = b.documento_id AND b.tabla = 'mensajes'", "n.not_fecha < '{$date} 00:00:00' AND b.procesado = 1");
$data = $rs->getResultToArray();
$rs->free();

$i = 0;

foreach ($data as $rec) {
    $filePath = APPLICATION_BASE_PATH . '/imgMensajes/' . $rec['not_imagen'];

    if (file_exists($filePath)) {
        echo ++$i, ' ----> ', $rec['not_fecha'], ' : ', $filePath . '<br />';
    }
}