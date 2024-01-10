<?php


require_once '../fpdf/fpdf.php';
require_once '../model/conexion.php';

// Clase extendida desde FPDF
class MiPDF extends FPDF
{
    function Header()
    {

        // Posicionar la imagen al costado izquierdo y hacerla un 30% más pequeña
        $this->Image('../img/logo23.png', 10, 10, 30); // Ajusta las coordenadas y el porcentaje según sea necesario

        // Texto al lado de la imagen
        $this->SetFont('Arial', 'B', 25);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(60, 20, 'ESCULA DE EDUCACIÓN BÁSICA PARTICULAR', 0, 0, 'C');



    }


    function Footer()
    {
        // Aquí defines el contenido del footer
        // Por ejemplo, puedes agregar números de página, información adicional, etc.
    }
}
// Función para generar el reporte
function generateReport($estudianteId)
{
    $pdf = new MiPDF();


    // Agregar una nueva página
    $pdf->AddPage();


    // agregar la tabla pacientes dependiendo el id
    $conn = conectarBaseDeDatos();
    $pdf->Output();

}

// Check if the 'generar_reporte' POST parameter is set
if (isset($_POST['generar_reporte'])) {
    $estudianteId = $_POST['generar_reporte'];
    generateReport($estudianteId);
}
$conn = null;
?>