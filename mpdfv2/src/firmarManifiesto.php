<?php
// require_once __DIR__ . '/vendor/autoload.php'; // Incluye la biblioteca mPDF
require_once("mpdfv2/src/Mpdf.php");  

// Verificar si se ha enviado un archivo
echo$firma=$_POST["firma"];
echo$namepdf=$_POST["pdf"];
// Verificar si se ha enviado un archivo
if ($namepdf!="") {
    //Ruta temporal del archivo subido
    $ruta_temporal_pdf = "img_manifiestos/manifiestos/".$namepdf;

    // Crear instancia de mPDF
    
    // $mpdf = new mPDF();
    // $mpdf->debug = true;
   
    // // Agregar el PDF original al nuevo PDF
    // $mpdf->SetImportUse();

    // // Páginas que se van a importar del PDF original
    // $pagina_inicio = 1; // Página de inicio
    // $pagina_fin = 2;    // Página final

    // // Agregar las páginas del PDF original al nuevo PDF
    // for ($pagina = $pagina_inicio; $pagina <= $pagina_fin; $pagina++) {
    //     $mpdf->AddPage();
    //     $mpdf->SetPageTemplate($pagina);
    //     $mpdf->importPage($pagina);
    // }

    // // Rutas de las imágenes a insertar en el PDF
    // $ruta_imagen1 = 'img_manifiestos/conductores/'.$firma;
    // $ruta_imagen2 = 'img_manifiestos/empresa/sello.png';

    // // Insertar las imágenes en el PDF
    // $mpdf->Image($ruta_imagen1, 10, 10, 50, 0); // Posición y tamaño de la primera imagen
    // $mpdf->Image($ruta_imagen2, 70, 10, 50, 0); // Posición y tamaño de la segunda imagen

    // // Guardar el PDF con las imágenes agregadas
    // $nombre_nuevo_pdf = $namepdf; // Usamos el nombre del PDF original
    // $mpdf->Output($nombre_nuevo_pdf, 'F'); // Guardar en el servidor

    // // Mover el nuevo PDF al mismo directorio que el PDF original
    // $ruta_pdf_original = 'img_manifiestos/manifiestos/' . $nombre_nuevo_pdf;
    // rename($nombre_nuevo_pdf, $ruta_pdf_original);

    echo "El PDF original ha sido reemplazado con el nuevo PDF que contiene las imágenes.";
} else {
    echo "Se produjo un error al cargar el archivo PDF.";
}

?>