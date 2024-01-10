<?php


require_once '../fpdf/fpdf.php';
require_once '../model/conexion.php';

// Clase extendida desde FPDF
class MiPDF extends FPDF
{
    function Header()
    {

        // Posicionar la imagen al costado izquierdo y hacerla un 30% más pequeña
        $this->Image('../img/logo23.png', 10, 10, 35); // Ajusta las coordenadas y el porcentaje según sea necesario

        // Texto al lado de la imagen
        $this->SetFont('Arial', 'B', 18);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(140, 15, iconv('UTF-8', 'ISO-8859-1', 'ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR'), 0, 0, 'C');
        $this->Ln(2);

        // Establecer la fuente y el texto
        $this->SetFont('Arial', 'B', 18);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->SetTextColor(236, 29, 23); // Establecer el color del texto en blanco para que sea legible en fondo rojo
        $this->Cell(137, 25, iconv('UTF-8', 'ISO-8859-1', '"LAS ÁGUILAS DEL SABER"'), 0, 0, 'C');
        // Restaurar el color original
        $this->SetTextColor(0, 0, 0);
        $this->Ln(9);

        $this->SetFont('Arial', 'B', 10);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(137, 20, iconv('UTF-8', 'ISO-8859-1', 'RESOLUCIÓN: DEO-DPE: 109-2009'), 0, 0, 'C');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 10);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(137, 20, iconv('UTF-8', 'ISO-8859-1', 'AMIE:07H01462'), 0, 0, 'C');
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 10);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(137, 20, iconv('UTF-8', 'ISO-8859-1', 'EL CAMBIO-MACHALA-ECUADOR'), 0, 0, 'C');

        $this->Ln(10);
        $this->SetFont('Arial', 'B', 20);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(137, 20, iconv('UTF-8', 'ISO-8859-1', 'HOJA DE MATRICULA'), 0, 0, 'C');


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

    $conn = conectarBaseDeDatos();

    $pdf->Ln(30);

    $sql = "SELECT * FROM estudiante WHERE id = :estudianteId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $estudianteDatos = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdf->SetFont('Arial', 'B', 16); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'DATOS DEL ESTUDIANTE'), 0, 1, 'C'); // Alineado al centro
    $pdf->ln(5); // Espacio después del título

    // Obtener la posición final del título
    $posicionTituloY = $pdf->GetY();

    // Definir la posición de inicio de las columnas
    $column1X = 10;
    $column2X = 60;

    // Columnas: Textos y Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 12); // Regular font style

    // Columna 1: Textos
    $pdf->SetXY($column1X, $posicionTituloY); // Establecer posición debajo del título
    $pdf->Cell(0, 8, iconv('UTF-8', 'ISO-8859-1', 'APELLIDOS:'), 0, 1); // Alineado a la izquierda
    $pdf->Cell(280, 8, iconv('UTF-8', 'ISO-8859-1', 'NOMBRES:'), 0, 1); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'CI:'), 0, 1, ); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'FECHA DE NAC:'), 0, 1, ); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'LUGAR DE NAC:'), 0, 1, ); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'RESIDENCIA:'), 0, 1, ); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'DIRECCIÓN:'), 0, 1, ); // Alineado a la izquierda
    $pdf->Cell(80, 8, iconv('UTF-8', 'ISO-8859-1', 'SECTOR:'), 0, 1, ); // Alineado a la izquierda
    // Columna 2: Resultados obtenidos de la base de datos
    // Columna 2: Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', '', 12); // Bold font style with increased size
    $pdf->SetXY($column2X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    $pdf->Cell(50, 8, ':' . mb_strtoupper($estudianteDatos['apellidos']), 0, 0, );
    $pdf->Cell(50, 8, ':' . mb_strtoupper($estudianteDatos['nombres']), 0, 0, ); // Alineado a la izquierda con salto de línea
    $pdf->Output();

}

// Check if the 'generar_reporte' POST parameter is set
if (isset($_POST['generar_reporte'])) {
    $estudianteId = $_POST['generar_reporte'];
    generateReport($estudianteId);
}
$conn = null;
?>