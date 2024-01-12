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

        $this->Ln(8);
        $this->SetFont('Arial', 'B', 18);
        $this->SetX(50); // Ajusta la posición horizontal del texto según sea necesario
        $this->Cell(137, 20, iconv('UTF-8', 'ISO-8859-1', 'HOJA DE MATRICULA'), 0, 0, 'C');



    }


    function Footer()
    {

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(270);
        $this->SetTextColor(236, 29, 23); // Establecer el color del texto en blanco para que sea legible en fondo rojo
        $this->Cell(0, 20, iconv('UTF-8', 'ISO-8859-1', 'CDLA.MARIO MINUCHE CALLE ELOY ALFARO Y TRECERA SUR'), 0, 0, 'R');
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(275);
        $this->SetTextColor(236, 29, 23); // Establecer el color del texto en blanco para que sea legible en fondo rojo
        $this->Cell(0, 20, iconv('UTF-8', 'ISO-8859-1', '07h1462@gmail.com'), 0, 0, 'R');

    }
}
// Función para generar el reporte
function generateReport($estudianteId)
{
    $pdf = new MiPDF();


    // Agregar una nueva página
    $pdf->AddPage();

    $conn = conectarBaseDeDatos();
    $pdf->Ln(15);

    $sql = "SELECT 
    m.numero,
    p.periodo,
    g.grado
    FROM
    matricula m join periodo p on m.Id=p.id_matricula 
    JOIN estudiante e on e.Id=m.id_estudiante 
    join grado g on e.id_grado=g.id
     WHERE e.id = :estudianteId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $gradoDatos = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdf->SetX(30); // Ajusta la posición horizontal del texto según sea necesario

    $pdf->SetFont('Arial', 'B', 18); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', mb_strtoupper($gradoDatos['grado']) . '   '.mb_strtoupper($gradoDatos['periodo']) ), 0, 1, 'C');




    $pdf->Ln(0);

    $sql = "SELECT * FROM estudiante WHERE id = :estudianteId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $estudianteDatos = $stmt->fetch(PDO::FETCH_ASSOC);



    $pdf->SetFont('Arial', 'B', 16); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'DATOS DEL ESTUDIANTE'), 0, 1, 'C'); // Alineado al centro
    $pdf->ln(0); // Espacio después del título



    // Obtener la posición final del título
    $posicionTituloY = $pdf->GetY();

    // Definir la posición de inicio de las columnas
    $column1X = 15;
    $column2X = 80;
    $column3X = 150; // Nueva posición para la tercera columna

    // Columnas: Textos y Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 10); // Regular font style

    // Columna 1: Textos
    $pdf->SetXY($column1X, $posicionTituloY); // Establecer posición debajo del título
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'APELLIDOS:'), 0, 1);
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'NOMBRES:'), 0, 1);
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'CI:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'FECHA DE NAC:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'LUGAR DE NAC:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'RESIDENCIA:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'DIRECCIÓN:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'SECTOR:'), 0, 1, ); // Alineado a la izquierda



    // Columna 2: Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', '', 10); // Bold font style with increased size
    $pdf->SetXY($column2X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    // Imprime el apellido en una línea
    $pdf->Cell(50, 6, ':' . mb_strtoupper($estudianteDatos['apellidos']), 0, 1);

    // Establecer la posición para el nombre en la siguiente línea
    $pdf->SetXY($column2X, $pdf->GetY());
    // Imprime el nombre en la siguiente línea
    $pdf->Cell(50, 6, ':' . mb_strtoupper($estudianteDatos['nombres']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, ':' . mb_strtoupper($estudianteDatos['cedula']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, ':' . mb_strtoupper($estudianteDatos['fecha_nacimiento']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($estudianteDatos['lugar_nacimiento'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($estudianteDatos['residencia'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($estudianteDatos['direccion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($estudianteDatos['sector'])), 0, 1);

    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 3
    $pdf->Cell(50, 6, '', 0, 1); // Alineado a la izquierda con salto de línea
    $pdf->SetXY($column3X, $posicionTituloY);



    // Verifica si se encontró el estudiante
    if ($estudianteDatos) {
        // Obtiene la imagen en formato blob
        $imagenBlob = $estudianteDatos['foto'];

        // Crea una imagen desde los datos blob
        $imagen = imagecreatefromstring($imagenBlob);

        // Crea una imagen temporal de 200x100 px
        $imagenTemporal = imagecreatetruecolor(200, 100);

        // Redimensiona la imagen original a 200x100 px
        imagecopyresampled($imagenTemporal, $imagen, 0, 0, 0, 0, 200, 100, imagesx($imagen), imagesy($imagen));

        // Guarda la imagen temporal como archivo
        $rutaTemporal = 'temp_image.jpg';
        imagejpeg($imagenTemporal, $rutaTemporal);

        // Establecer la posición XY para la imagen
        $column3X = 150; // Ajusta la posición X según tus necesidades
        $pdf->SetXY($column3X, $pdf->GetY());

        // Calcula las nuevas dimensiones reduciendo en un 20%
        $nuevaAnchura = 0.8 * 50;
        $nuevaAltura = 0.8 * 50;

        // Insertar la imagen en el PDF un 20% más pequeña
        $pdf->Image($rutaTemporal, $pdf->GetX(), $pdf->GetY(), $nuevaAnchura, $nuevaAltura);

        // Elimina el archivo temporal
        unlink($rutaTemporal);
    }





    $sql = "SELECT * FROM persona p JOIN rol r on p.Id=r.id_persona where r.rol='papa'; AND id = :estudianteId ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $papaDatos = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdf->ln(50);

    $pdf->SetFont('Arial', 'B', 16); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'DATOS DEL PADRE'), 0, 1, 'C'); // Centered
    $pdf->ln(0); // Space after the title


    // Obtener la posición final del título
    $posicionTituloY = $pdf->GetY();

    // Definir la posición de inicio de las columnas
    $column1X = 15;
    $column2X = 80;
    $column3X = 150; // Nueva posición para la tercera columna

    // Columnas: Textos y Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 10); // Regular font style

    // Columna 1: Textos
    $pdf->SetXY($column1X, $posicionTituloY); // Establecer posición debajo del título
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'APELLIDOS Y NOMBRES:'), 0, 1);
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'N° DE CEDULA:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'DIRECCION DEL DOM.:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'OCUPACIÓN/PROFESIÓN:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'TELF.DOMICILIO-CELULAR:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'EMAIL:'), 0, 1, ); // Alineado a la izquierda



    // Columna 2: Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', '', 10); // Bold font style with increased size
    $pdf->SetXY($column2X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    // Imprime el apellido en una línea
    $pdf->Cell(50, 6, ':' . mb_strtoupper($papaDatos['apellidos_nombres']), 0, 1);
    // Establecer la posición para el nombre en la siguiente línea
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, ':' . mb_strtoupper($papaDatos['cedula']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($papaDatos['direccion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($papaDatos['ocupacion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($papaDatos['telefono'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($papaDatos['correo'])), 0, 1);





    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 3
    $pdf->Cell(50, 8, '', 0, 1); // Alineado a la izquierda con salto de línea
    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 2


    if ($papaDatos) {
        // Obtiene la imagen en formato blob
        $imagenBlobpapa = $papaDatos['foto'];

        // Crea una imagen desde los datos blob
        $imagenpapa = imagecreatefromstring($imagenBlobpapa);

        // Crea una imagen temporal de 200x100 px
        $imagenTemporalpapa = imagecreatetruecolor(200, 100);

        // Redimensiona la imagen original a 200x100 px
        imagecopyresampled($imagenTemporalpapa, $imagenpapa, 0, 0, 0, 0, 200, 100, imagesx($imagenpapa), imagesy($imagenpapa));

        // Guarda la imagen temporal como archivo
        $rutaTemporalpapa = 'temp_image_papa.jpg';
        imagejpeg($imagenTemporalpapa, $rutaTemporalpapa);

        // Establecer la posición XY para la imagen
        $column3X = 150; // Ajusta la posición X según tus necesidades
        $pdf->SetXY($column3X, $pdf->GetY());

        // Calcula las nuevas dimensiones reduciendo en un 20%
        $nuevaAnchura = 0.8 * 50;
        $nuevaAltura = 0.8 * 50;

        // Insertar la imagen en el PDF un 20% más pequeña
        $pdf->Image($rutaTemporalpapa, $pdf->GetX(), $pdf->GetY(), $nuevaAnchura, $nuevaAltura);

        // Elimina el archivo temporal
        unlink($rutaTemporalpapa);
    }



    $sql = "SELECT * FROM persona p JOIN rol r on p.Id=r.id_persona where r.rol='mama'; AND id = :estudianteId ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $mamaDatos = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdf->ln(40);

    $pdf->SetFont('Arial', 'B', 16); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'DATOS DE LA MADRE'), 0, 1, 'C'); // Centered
    $pdf->ln(0); // Space after the title


    // Obtener la posición final del título
    $posicionTituloY = $pdf->GetY();

    // Definir la posición de inicio de las columnas
    $column1X = 15;
    $column2X = 80;
    $column3X = 150; // Nueva posición para la tercera columna

    // Columnas: Textos y Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 10); // Regular font style

    // Columna 1: Textos
    $pdf->SetXY($column1X, $posicionTituloY); // Establecer posición debajo del título
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'APELLIDOS Y NOMBRES:'), 0, 1);
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'N° DE CEDULA:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'DIRECCION DEL DOM.:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'OCUPACIÓN/PROFESIÓN:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'TELF.DOMICILIO-CELULAR:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'EMAIL:'), 0, 1, ); // Alineado a la izquierda



    // Columna 2: Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', '', 10); // Bold font style with increased size
    $pdf->SetXY($column2X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    // Imprime el apellido en una línea
    $pdf->Cell(50, 6, ':' . mb_strtoupper($mamaDatos['apellidos_nombres']), 0, 1);
    // Establecer la posición para el nombre en la siguiente línea
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, ':' . mb_strtoupper($mamaDatos['cedula']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($mamaDatos['direccion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($mamaDatos['ocupacion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($mamaDatos['telefono'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($mamaDatos['correo'])), 0, 1);





    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 3
    $pdf->Cell(50, 8, '', 0, 1); // Alineado a la izquierda con salto de línea
    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 2


    if ($mamaDatos) {
        // Obtiene la imagen en formato blob
        $imagenBlobmama = $mamaDatos['foto'];

        // Crea una imagen desde los datos blob
        $imagenmama = imagecreatefromstring($imagenBlobmama);

        // Crea una imagen temporal de 200x100 px
        $imagenTemporalmama = imagecreatetruecolor(200, 100);

        // Redimensiona la imagen original a 200x100 px
        imagecopyresampled($imagenTemporalmama, $imagenmama, 0, 0, 0, 0, 200, 100, imagesx($imagenmama), imagesy($imagenmama));

        // Guarda la imagen temporal como archivo
        $rutaTemporalmama = 'temp_image_mama.jpg';
        imagejpeg($imagenTemporalmama, $rutaTemporalmama);

        // Establecer la posición XY para la imagen
        $column3X = 150; // Ajusta la posición X según tus necesidades
        $pdf->SetXY($column3X, $pdf->GetY());

        // Calcula las nuevas dimensiones reduciendo en un 20%
        $nuevaAnchura = 0.8 * 50;
        $nuevaAltura = 0.8 * 50;

        // Insertar la imagen en el PDF un 20% más pequeña
        $pdf->Image($rutaTemporalmama, $pdf->GetX(), $pdf->GetY(), $nuevaAnchura, $nuevaAltura);

        // Elimina el archivo temporal
        unlink($rutaTemporalmama);
    }


    $sql = "SELECT * FROM persona p JOIN rol r on p.Id=r.id_persona where r.rol='representante'; AND id = :estudianteId ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
    $stmt->execute();
    $representanteDatos = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdf->ln(40);

    $pdf->SetFont('Arial', 'B', 16); // Regular font style
    $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'DATOS DEL REPRESENTANTE'), 0, 1, 'C'); // Centered
    $pdf->ln(0); // Space after the title

    // Obtener la posición final del título
    $posicionTituloY = $pdf->GetY();

    // Definir la posición de inicio de las columnas
    $column1X = 15;
    $column2X = 80;
    $column3X = 150; // Nueva posición para la tercera columna

    // Columnas: Textos y Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', 'B', 10); // Regular font style

    // Columna 1: Textos
    $pdf->SetXY($column1X, $posicionTituloY); // Establecer posición debajo del título
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'APELLIDOS Y NOMBRES:'), 0, 1);
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'N° DE CEDULA:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'DIRECCION DEL DOM.:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'OCUPACIÓN/PROFESIÓN:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'TELF.DOMICILIO-CELULAR:'), 0, 1, ); // Alineado a la izquierda
    $pdf->SetXY($column1X, $pdf->GetY());
    $pdf->Cell(0, 6, iconv('UTF-8', 'ISO-8859-1', 'EMAIL:'), 0, 1, ); // Alineado a la izquierda



    // Columna 2: Resultados obtenidos de la base de datos
    $pdf->SetFont('Arial', '', 10); // Bold font style with increased size
    $pdf->SetXY($column2X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    // Imprime el apellido en una línea
    $pdf->Cell(50, 6, ':' . mb_strtoupper($representanteDatos['apellidos_nombres']), 0, 1);
    // Establecer la posición para el nombre en la siguiente línea
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, ':' . mb_strtoupper($representanteDatos['cedula']), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($representanteDatos['direccion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($representanteDatos['ocupacion'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($representanteDatos['telefono'])), 0, 1);
    $pdf->SetXY($column2X, $pdf->GetY());
    $pdf->Cell(50, 6, iconv('UTF-8', 'ISO-8859-1', ':' . mb_strtoupper($representanteDatos['correo'])), 0, 1);





    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 3
    $pdf->Cell(50, 8, '', 0, 1); // Alineado a la izquierda con salto de línea
    $pdf->SetXY($column3X, $posicionTituloY); // Establecer posición debajo del título para la columna 2

    if ($representanteDatos) {
        // Obtiene la imagen en formato blob
        $imagenBlobrepre = $representanteDatos['foto'];

        // Crea una imagen desde los datos blob
        $imagenrepre = imagecreatefromstring($imagenBlobrepre);

        // Crea una imagen temporal de 200x100 px
        $imagenTemporalrepre = imagecreatetruecolor(200, 100);

        // Redimensiona la imagen original a 200x100 px
        imagecopyresampled($imagenTemporalrepre, $imagenrepre, 0, 0, 0, 0, 200, 100, imagesx($imagenmama), imagesy($imagenmama));

        // Guarda la imagen temporal como archivo
        $rutaTemporalrepre = 'temp_image_repre.jpg';
        imagejpeg($imagenTemporalrepre, $rutaTemporalrepre);

        // Establecer la posición XY para la imagen
        $column3X = 150; // Ajusta la posición X según tus necesidades
        $pdf->SetXY($column3X, $pdf->GetY());

        // Calcula las nuevas dimensiones reduciendo en un 20%
        $nuevaAnchura = 0.8 * 50;
        $nuevaAltura = 0.8 * 50;

        // Insertar la imagen en el PDF un 20% más pequeña
        $pdf->Image($rutaTemporalrepre, $pdf->GetX(), $pdf->GetY(), $nuevaAnchura, $nuevaAltura);

        // Elimina el archivo temporal
        unlink($rutaTemporalrepre);
    }



    $pdf->Output();

}

// Check if the 'generar_reporte' POST parameter is set
if (isset($_POST['generar_reporte'])) {
    $estudianteId = $_POST['generar_reporte'];
    generateReport($estudianteId);
}
$conn = null;
?>