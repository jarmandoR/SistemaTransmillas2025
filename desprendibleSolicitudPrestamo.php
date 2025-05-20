<?php
// include class

// require("login_autentica.php");
// include("cabezote3.php"); 
// $nombre="nombre";
// $cedula="cedula";
// $valor="80000";
// $deudas="deudas";
// $fechaini="fechaini";
// $fechafin="fechafin";
// $asc="ASC";


$diastrabajados=$_GET["diastrabajados"];
$sueldo=$_GET["sueldo"];
$auxilitrans=$_GET["auxilitrans"];
$pagdiasinca=$_GET["pagdiasinca"];
$totaldeveng=$_GET["totaldeveng"];
$salud=$_GET["salud"];
$pension=$_GET["pension"];
$prestamos=$_GET["prestamos"];
$totaldeduccion=$_GET["totaldeduccion"];

$valor=$_GET["valor"];
$deudas=$_GET["deudas"];
$validado=$_GET["confirmado"];
$diasIncapacidad=$_GET["diasIncapacidad"];
$valordiasVacaciones=$_GET["vacaciones"];
$diasVacaciones=$_GET["diasvacaciones"];
$firma=$_GET["firma"];

$descriprestamos=$_GET["descriprestamos"];
$valorAjusteB=$_GET["valorAjuste"];
$tipoAjusteB=$_GET["tipoAjuste"];
$descripcionAjusteB=$_GET["descripcionAjuste"];

$ajustessumB=0;
$ajustesresB=0;
if ($tipoAjusteB=="suma") {
    $ajustessumB=$valorAjusteB;
    $ajustesresB=0;
}else if($tipoAjusteB=="descuento"){
    $ajustessumB=0;
    $ajustesresB=$valorAjusteB;
}

// desprendibleBasico.php?cedula=".$rw1[5]."&nombre=".$rw1[1].$rw1[2]."&cargo=$rw1[3]&fechaini=$fechaactual&fechafin=$fechafinal&cuenta=&diastrabajados=$diassitrabajo&sueldo=$valordediastrabajados&auxilitrans=$totalauxilio&pagdiasinca=$valorDiasIncapadidad&totaldeveng=$totaldevengado&salud=$valorSalud&pension=$valorPension&prestamos=$restaABasico&totaldeduccion=$totaldeduccion"

$fechaini = strtotime($fechaini);
$fechafin = strtotime($fechafin);

$fechainidia=date("d",$fechaini);
$fechainimes=date("m",$fechaini);
$fechainiaño=date("Y",$fechaini);      


$fechafindia=date("d",$fechafin);
$fechafinmes=date("m",$fechafin);
$fechafinaño=date("Y",$fechafin);   
//             $fechadelregidia = date("d",$fechadelregi);

// // error_reporting(0);
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Cabecera de página


function addBackground($file, $x = 0, $y = 0, $w = null, $h = null) {
    $this->Image($file, $x, $y, $w, $h);
}
function Header()
{

$sede=$_GET["sede"];
$cedula=$_GET["cedula"];
$nombre=$_GET["nombre"];
$cargo=$_GET["cargo"];
$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];
          // Definir borde negro alrededor del encabezado
          $this->SetLineWidth(0.5); // Establece el ancho de línea
          $this->SetDrawColor(0, 0, 0); // Establece el color del borde (negro)
          $this->Rect(10, 10, 190, 60, 'D'); // Dibuja un rectángulo con borde

    $this->SetFont('Times','B',15);
   
    $this->Cell(80);
   
    $this->Ln(20);

    $this->SetFont('Arial', 'B', 15); // Establece la fuente, el estilo (negrita) y el tamaño (12 puntos)
    $this->SetY($this->GetY() -15); // Mueve hacia abajo
        $this->Cell(150, 10, 'FORMATO  DE SOLICITUD DE PRESTAMO', 0, 1, 'C'); // Agrega un título centrado
        $this->Cell(150, 10, 'TRANSMILLAS LOGISTICA Y TRANSPORTE SAS', 0, 1, 'C');
        $this->Cell(150, 10, '', 0, 1, 'C');
        // $posX = $this->GetPageWidth() - 50; // Ajusta el valor según sea necesario
        
        // // Agrega la imagen al lado derecho del encabezado
        // $this->Image('images/logoDesprendible.jpg', $posX, $this->GetY(), 20); // Cambia 'ruta/a/tu/imagen.png' a la ruta de tu imagen y ajusta el tamaño si es necesario


        $imageWidth = 35; // Ancho de la imagen
        $textWidth = $this->GetStringWidth('DESPRENDIBLE DE NOMINA'); // Ancho del texto
        $availableWidth = $this->GetPageWidth() - $textWidth - $imageWidth; // Ancho disponible para la imagen
        $posX = $this->GetPageWidth() - $availableWidth; // Posición x para la imagen
        // Calcula la posición y para la imagen (subir un poco la imagen)
        $posY = $this->GetY() -20; // Ajusta el valor según sea necesario

        // Agrega la imagen al lado derecho del encabezado
        $this->Image('images/logoDesprendible.jpg', $posX, $posY, $imageWidth); // Cambia 'ruta/a/tu/imagen.png' a la ruta de tu imagen y ajusta el tamaño si es necesario
        // Agrega la imagen al lado derecho del encabezado
        // $this->Image('images/logoDesprendible.jpg', $posX, $this->GetY(), $imageWidth); // Cambia 'ruta/a/tu/imagen.png' a la ruta de tu imagen y ajusta el tamaño si es necesario
        
        // $this->SetFont('Arial', '', 12);

        // $this->SetY($this->GetY() +1); // Mueve hacia abajo
        // $this->Cell(143, 10,'CEDULA '.$cedula.'                                        No.BOG 50', 0, 1, 'C');
        // $this->SetY($this->GetY() -2); // Mueve hacia abajo
        // $this->Cell(90, 10, 'NOMBRE '.$nombre.'                                        ', 0, 1, 'C');
        // $this->SetY($this->GetY() -2); // Mueve hacia abajo
        // $this->Cell(84, 10, 'Cargo '.$cargo.'                                          ', 0, 1, 'C');
        // $this->SetY($this->GetY() -2); // Mueve hacia abajo
        // $this->Cell(98, 10, 'Periodo del:'.$fechaini.'  Al:  '.$fechafin.'             ', 0, 1, 'C');
        // $this->SetY($this->GetY() -2); // Mueve hacia abajo
        // $this->Cell(173, 10, 'No DAVIVIENDA '.$cedula.'                                                               BOGOTA', 0, 1, 'C');

}






// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-1);
    // Times italic 8
    $this->SetFont('Times','I',8);
    // $this->Image('assets/piedepaginaberm.jpg',0,260,0);
    // Número de página
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}




// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Ln(20);
$pdf->SetY($pdf->GetY() -10); // Mueve hacia abajo
$pdf->SetDrawColor(0, 0, 0); // Establecer color de borde en blanco
// Dibuja el primer rectángulo
$pdf->SetLineWidth(0.5); // Establece el ancho de línea
$pdf->SetDrawColor(0, 0, 0); // Establece el color del borde (negro en este caso)
$pdf->Rect(10, 72, 95, 15); // Dibuja un rectángulo con relleno





$pdf->SetY($pdf->GetY() +5); // Mueve hacia abajo


// Lista 1

$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(190, 10, 'DATOS DEL SOLICITANTE', 1);
$pdf->Ln(); // Salto de línea

// Lista 2
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'APELLIDOS Y NOMBRE COMPLETO', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 3
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'DOCUMENTO DE IDENTIFICACION', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 4
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'CARGO', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 5

$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'VALOR A DESCONTAR', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '$', 1);
$pdf->Ln(); // Salto de línea

// Lista 6

$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'SALDO PENDIENTE', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 7
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'MOTIVO DEL DESCUENTO O PRESTAMO', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 8
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(190, 10, 'INFORMACION DEL SOLICITANTE', 1);
$pdf->Ln(); // Salto de línea

// Lista 9

$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(63.33, 10, 'VALOR CUOTAS QUINCENALES', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(63.33, 10, 'NUMERO DE CUOTAS', 1);
$pdf->SetFont('Arial', '', 9); // Restaurar fuente normal
$pdf->Cell(63.33, 10, 'DESCUENTO PRIMA-PRESTACIONES', 1);
$pdf->Ln(); // Salto de línea

// Lista 9
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(63.33, 10, '$', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(63.33, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(63.33, 10, '', 1);
$pdf->Ln(); // Salto de línea

// Lista 10
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(190, 10, 'AL FIRMAR EL PRESENTE FORMATO EL SOLICITANTE AUTORIZA, EXPRESA E IRREVOCABLEMENTE A ', 1);
$pdf->Cell(190, 10, 'DESCONTAR DE MI SALARIO, BONIFICACIONES, PRESTACIONES SOCIALES, VACACIONES Y/O ', 1);
$pdf->Cell(190, 10, 'INDEMNIZACION, EL SALDO QUE ADEUDE EN CASO DE TERMINACION DEL CONTRATO O RETIRO  ', 1);
$pdf->Cell(190, 10, 'VOLUNTARIO ', 1);
$pdf->Ln(); // Salto de línea

// Lista 11
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(190, 10, 'AUTORIZACIONES', 1);
$pdf->Ln(); // Salto de línea

// LISTA 12 
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'FIRMA DEL SOLICITANTE', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, 'FIRMA DE AUTORIZACIONES', 1);
$pdf->Ln(); // Salto de línea

// LISTA 13
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(95, 10, '', 1);
$pdf->Ln(); // Salto de línea


// LISTA 14
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'DIA', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'MES', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'AÑO', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'DIA', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'MES', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, 'AÑO', 1);
$pdf->Ln(); // Salto de línea


// LISTA 15
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->SetFont('Arial', '', 10); // Restaurar fuente normal
$pdf->Cell(31.66, 10, '', 1);
$pdf->Ln(); // Salto de línea


$pdf->Output();
?>
