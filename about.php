<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Aguilas del Saber</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
  <?php

include_once('web2/model/conexion.php');
// Obtener datos de la base de datos
$query = "SELECT * FROM general";
$result = $pdo->query($query);

include_once('web2/model/conexion.php');
// Obtener datos de la base de datos
$query2 = "SELECT * FROM historia";
$result2 = $pdo->query($query2);


?>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <?php
      $query1 = "SELECT img1 FROM imagenes"; // Ahora se selecciona img3, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img1']) {
              // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img1'];
              
              // Imprime el elemento img con la ruta completa y una clase para efectos
              echo '<img src="' . htmlspecialchars($imagenPath) . '" style="width:80px; height: 80px; margin-right: 5px;" alt="Imagen">';
          }
      }
      ?>
        <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 40px"
        >
        
          <?php 
      $result = $pdo->query($query);
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo '<span class="text" style="color: #DD4A48;">' . htmlspecialchars($row["titulo"]) . '</span>';
      }
  ?>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
        <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Inicio</a>
            <a href="blog.php" class="nav-item nav-link">Comunicados</a>
            <a href="about.php" class="nav-item nav-link">Quienes Somos</a>
            <a href="gallery.php" class="nav-item nav-link">Galeria</a>
            <a href="single.php" class="nav-item nav-link">Blog</a>
            <a href="contact.php" class="nav-item nav-link">Contacto</a>
        </div>
        <a href="./administracion/login.php" class="btn btn-primary px-4">Iniciar Sesión</a>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="text-justify container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Sobre Nosotros</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Inicio</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Sobre Nosotros</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

   <!-- About Start -->
   <div class=" text-justify container-fluid py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
        <?php
      $query1 = "SELECT img8 FROM imagenes"; // Ahora se selecciona img3, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img8']) {
              // Se construye la ruta completa incluyendo 'web2/img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img8'];
              
              // Imprime el elemento img con la ruta completa
              echo '<img class="img-fluid rounded mb-5 mb-lg-0" src="' . htmlspecialchars($imagenPath) . '" alt="">';
          }
      }
      ?>
        </div>
        <div class="col-lg-7">
          <p class="section-title pr-5">
          <?php 
      $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'footer1' contiene el texto que quieres mostrar en el span.
          echo '<span>' . htmlspecialchars($row["titulo"]) . '</span>';
      }
      ?>
          </p>
            <?php 
      $result = $pdo->query($query);
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo '<h1 class="mb-4">' . htmlspecialchars($row["titulonosotros"]) . '</h1>';
          echo '<p>' . htmlspecialchars($row["contenidonosotros"]) . '</p>';
      }
  ?>
          <div class="row pt-2 pb-4">
            <div class="col-6 col-md-4">
                    <?php
        $query1 = "SELECT img9 FROM imagenes"; // Se selecciona img9, que contiene la ruta de la imagen
        $result1 = $pdo->query($query1);

        if ($result1) {
            $row = $result1->fetch(PDO::FETCH_ASSOC);

            if ($row['img9']) {
                // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
                $imagenPath = 'img/' . $row['img9'];
                
                // Imprime el elemento img con la ruta completa
                echo '<img class="img-fluid rounded" src="' . htmlspecialchars($imagenPath) . '" alt="">';
            }
        }
        ?>

            </div>
            <div class="col-6 col-md-8">
              <ul class="list-inline m-0">
                <li class="py-2 border-top border-bottom">
                        <?php 
            $result = $pdo->query($query);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<i class="fa fa-check text-primary mr-3"></i>' . htmlspecialchars($row["d1"]);
            }
        ?>
                </li>
                
                <li class="py-2 border-bottom">
                <?php 
            $result = $pdo->query($query);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<i class="fa fa-check text-primary mr-3"></i>' . htmlspecialchars($row["d2"]);
            }
        ?>
                </li>
              </ul>
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

    <!-- About Start -->
    <div class="text-justify container-fluid py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
              <?php
      $query1 = "SELECT img10 FROM imagenes"; // Se selecciona img10, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img10']) {
              // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img10'];
              
              // Imprime el elemento img con la ruta completa
              echo '<img class="img-fluid rounded mb-5 mb-lg-0" src="' . htmlspecialchars($imagenPath) . '" alt="">';
          }
      }
      ?>

        </div>
        <div class="col-lg-7">
        
          <?php 
      $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'identidad' contiene el texto que quieres mostrar como título en <h1>.
          echo '<h1 class="mb-4">' . htmlspecialchars($row["identidad"]) . '</h1>';
      }
  ?>

          
            <?php 
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["contenido1"])) . '</p>';
            }
            ?>
          
      
        
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->
  <!-- Hero Section -->
<header class=" text-justify text-white text-center py-4 d-flex align-items-center" style="background-color: #DD4A48;">
  <div class="container">
    <!-- Reemplaza 'Título del Albergue' con el contenido real de $row['h_albergue'] -->
    <?php 
    $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
    if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
        // Asumiendo que la columna 'titulohistoria' contiene el texto que quieres mostrar como título en <h1>.
        echo '<h1 class="display-3 font-weight-bold text-white m-0">' . htmlspecialchars($row["titulohistoria"]) . '</h1>';
    }
?>

    <!-- Reemplaza 'Descripción del Albergue' con el contenido real de $row['descripcion'] -->
    <?php 
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p class="lead">' . nl2br(htmlspecialchars($row["descripcion"])) . '</p>';
            }
            ?>
  </div>
</header>


<!-- About Start -->
<div class="text-justify container-fluid py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <?php 
          $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
          if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
              // Asumiendo que la columna 'identidad' contiene el texto que quieres mostrar como título en <h1>.
              echo '<h1 class="mb-4">' . htmlspecialchars($row["d1"]) . '</h1>';

              // Asumiendo que la columna 'contenido2' contiene el texto que quieres mostrar como párrafos.
              $contenido2 = htmlspecialchars($row["contenido2"]);

              // Dividir el contenido en párrafos usando la etiqueta <p>
              $parrafos = explode("\n", $contenido2);

              // Imprimir cada párrafo en una etiqueta <p>, excluyendo el último párrafo
              for ($i = 0; $i < count($parrafos) - 1; $i++) {
                  if (!empty(trim($parrafos[$i]))) {
                      echo '<p>' . trim($parrafos[$i]) . '</p>';
                  }
              }

              // Agregar el resto de tu código según sea necesario.
              echo '<div class="row pt-2 pb-4">';
              echo '<div class="col-6 col-md-4">';
              
        $query1 = "SELECT img11 FROM imagenes"; // Seleccionamos img11, que contiene la ruta de la imagen
        $result1 = $pdo->query($query1);

        if ($result1) {
            $row = $result1->fetch(PDO::FETCH_ASSOC);

            if ($row['img11']) {
                // Construimos la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
                $imagenPath = 'img/' . $row['img11'];
                
                // Imprimimos el elemento img con la ruta completa
                echo '<img class="img-fluid rounded" src="' . htmlspecialchars($imagenPath) . '" alt="" />';
            }
        }
              echo '</div>';
              echo '<div class="col-6 col-md-8">';
              echo '<ul class="list-inline m-0">';
              
              // Imprimir el último párrafo junto a la imagen pequeña
              echo '<p>' . trim(end($parrafos)) . '</p>';
    
              echo '</ul>';
              echo '</div>';
              echo '</div>';
          }
        ?>
      </div>
      <div class="col-lg-5">
        <?php
  $query1 = "SELECT img12 FROM imagenes"; // Seleccionamos img12, que contiene la ruta de la imagen
  $result1 = $pdo->query($query1);

  if ($result1) {
      $row = $result1->fetch(PDO::FETCH_ASSOC);

      if ($row['img12']) {
          // Construimos la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
          $imagenPath = 'img/' . $row['img12'];
          
          // Imprimimos el elemento img con la ruta completa
          echo '<img class="img-fluid rounded mb-5 mb-lg-0" src="' . htmlspecialchars($imagenPath) . '" alt="" />';
      }
  }
  ?>

      </div>
    </div>
  </div>
</div>
<!-- About End -->


  <!-- About Start -->
<div class="text-justify container-fluid py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <?php 
          $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
          if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
              // Asumiendo que la columna 'identidad' contiene el texto que quieres mostrar como título en <h1>.
              echo '<h1 class="mb-4">' . htmlspecialchars($row["d2"]) . '</h1>';

              // Asumiendo que la columna 'contenido2' contiene el texto que quieres mostrar como párrafos.
              $contenido3 = htmlspecialchars($row["contenido3"]);

              // Dividir el contenido en párrafos usando la etiqueta <p>
              $parrafos = explode("\n", $contenido3);

              // Imprimir cada párrafo en una etiqueta <p>, excluyendo el último párrafo
              for ($i = 0; $i < count($parrafos) - 1; $i++) {
                  if (!empty(trim($parrafos[$i]))) {
                      echo '<p>' . trim($parrafos[$i]) . '</p>';
                  }
              }

              // Aquí no imprimo el último párrafo ya que lo mostraré en la nueva sección
          }
        ?>
      </div>
      <div class="col-lg-5">
            <?php
      $query1 = "SELECT img13 FROM imagenes"; // Seleccionamos img13, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img13']) {
              // Construimos la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img13'];
              
              // Imprimimos el elemento img con la ruta completa
              echo '<img class="img-fluid rounded mb-5 mb-lg-0" src="' . htmlspecialchars($imagenPath) . '" alt="" />';
          }
      }
      ?>

      </div>
    </div>
  </div>
</div>
<!-- About End -->

<section id="about" class="text-justify bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <!-- Agrego el último párrafo junto a la imagen pequeña -->
        <?php 
          if ($row) {
              echo '<p>' . trim(end($parrafos)) . '</p>';
          }
        ?>
      </div>
      <div class="col-lg-6 d-flex justify-content-center">
        <div class="image-container"
          style="max-width: 50%; max-height: 700px; overflow: hidden; border-radius: 10px; margin-left: 40px;">
          <!-- Aquí insertas la imagen que normalmente obtendrías de $row['img17'] -->
              <?php
    $query1 = "SELECT img14 FROM imagenes"; // Seleccionamos img14, que contiene la ruta de la imagen
    $result1 = $pdo->query($query1);

    if ($result1) {
        $row = $result1->fetch(PDO::FETCH_ASSOC);

        if ($row['img14']) {
            // Construimos la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
            $imagenPath = 'img/' . $row['img14'];
            
            // Imprimimos el elemento img con la ruta completa, manteniendo las propiedades de estilo y clase
            echo '<img src="' . htmlspecialchars($imagenPath) . '" alt="Imagen de la fundación" class="img-fluid" style="width: 300px; height: 250px;">';
        }
    }
    ?>

          <!-- Aquí insertas el caption que normalmente obtendrías de $row['d2'] -->
        </div>
      </div>
    </div>
  </div>
</section>




  

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                          <?php 
                $result = $pdo->query($query);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<h4>' . htmlspecialchars($row["descripcion1"]) . '</h4>';
                    echo '<p class="m-0">' . htmlspecialchars($row["contenido1"]) . '</p>';
                }
            ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                        <?php 
              $result = $pdo->query($query);
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo '<h4>' . htmlspecialchars($row["descripcion2"]) . '</h4>';
                  echo '<p class="m-0">' . htmlspecialchars($row["contenido2"]) . '</p>';
              }
          ?>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                        <?php 
              $result = $pdo->query($query);
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo '<h4>' . htmlspecialchars($row["descripcion3"]) . '</h4>';
                  echo '<p class="m-0">' . htmlspecialchars($row["contenido3"]) . '</p>';
              }
          ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
              <?php 
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<h4>' . htmlspecialchars($row["descripcion4"]) . '</h4>';
        echo '<p class="m-0">' . htmlspecialchars($row["contenido4"]) . '</p>';
    }
?>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
              <?php 
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<h4>' . htmlspecialchars($row["descripcion5"]) . '</h4>';
        echo '<p class="m-0">' . htmlspecialchars($row["contenido5"]) . '</p>';
    }
?>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
              <?php 
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<h4>' . htmlspecialchars($row["descripcion6"]) . '</h4>';
        echo '<p class="m-0">' . htmlspecialchars($row["contenido6"]) . '</p>';
    }
?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Facilities Start -->


    <div
      class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
          <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
                <?php 
      $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'footer1' contiene el texto que quieres mostrar en el span.
          echo '<span class="text-white">' . htmlspecialchars($row["footer1"]) . '</span>';
      }
      ?>

          </a>
          <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["contenido14"])) . '</p>';
            }
            ?>
          <?php 
  $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      // Utiliza los valores de las columnas 'facebook' e 'instagram' para los enlaces.
      $facebookLink = htmlspecialchars($row["facebook"]);
      $instagramLink = htmlspecialchars($row["instagram"]);
  ?>
      <div class="d-flex justify-content-start mt-4">
          <a class="btn btn-outline-primary rounded-circle text-center text-white mr-2 px-0" style="width: 38px; height: 38px" href="<?php echo $facebookLink; ?>">
              <i class="fab fa-facebook-f text-white"></i>
          </a>
          
          <a class="btn btn-outline-primary rounded-circle text-center text-white mr-2 px-0" style="width: 38px; height: 38px" href="<?php echo $instagramLink; ?>">
              <i class="fab fa-instagram text-white"></i>
          </a>
      </div>
  <?php 
  }
  ?>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Ubicacion</h5>
              <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["ubicacion"])) . '</p>';
            }
            ?>
          
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Correo Electronico</h5>
              <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["correo"])) . '</p>';
            }
            ?>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Celular</h5>
              <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["celular"])) . '</p>';
            }
            ?>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Contactenos</h3>
          <form action="">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control border-0 py-4"
                    placeholder="Nombres Completos"
                    required="required"
                />
            </div>
            <div class="form-group">
                <input
                    type="email"
                    class="form-control border-0 py-4"
                    placeholder="Correo Electronico"
                    required="required"
                />
            </div>
            <div class="form-group">
                <textarea
                    class="form-control border-0 py-4"
                    placeholder="Mensaje"
                    required="required"
                ></textarea>
            </div>
            <div>
                <button
                    class="btn btn-primary btn-block border-0 py-3"
                    type="submit"
                >
                    Enviar Mensaje
                </button>
            </div>
        </form>
        
        </div>
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">Las Aguilas del Saber</a>.
          Nos Reservamos los Derechos.
        </p>
      </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
