<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Las Aguilas del Saber</title>
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
    <link href="css/carousel.css" rel="stylesheet" />
  </head>

  <body>
  <?php

    include_once('web2/model/conexion.php');
    // Obtener datos de la base de datos
    $query = "SELECT * FROM general";
    $result = $pdo->query($query);

    include_once('web2/model/conexion.php');
    // Obtener datos de la base de datos
    $query2 = "SELECT * FROM padres";
    $result2 = $pdo->query($query2);

    include_once('web2/model/conexion.php');
    // Obtener datos de la base de datos
    $query3 = "SELECT * FROM profesores";
    $result3 = $pdo->query($query3);
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

    <section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left">
              <?php 
                $result = $pdo->query($query);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<h4 class="text-highlight mb-4 mt-5 mt-lg-0">' . htmlspecialchars($row["seccion1"]) . '</h4>';
                    echo '<h1 class="display-3 font-weight-bold">' . htmlspecialchars($row["seccion2"]) . '</h1>';
                }
            ?>
        <a href="about.php" class="btn btn-primary mt-1 py-3 px-5 font-weight-bold " style="color: white;">Ver más</a>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
          <?php
    $query1 = "SELECT img2 FROM imagenes"; // Ahora se selecciona img3, que contiene la ruta de la imagen
    $result1 = $pdo->query($query1);

    if ($result1) {
        $row = $result1->fetch(PDO::FETCH_ASSOC);

        if ($row['img2']) {
            // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
            $imagenPath = 'img/' . $row['img2'];
            
            // Imprime el elemento img con la ruta completa y una clase para efectos
            echo '<img class="img-fluid rounded mb-5 mb-lg-0 dynamic-image" src="' . htmlspecialchars($imagenPath) . '" alt="Imagen educativa">';
        }
    }
    ?>
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

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <?php
      $query1 = "SELECT img3 FROM imagenes"; // Ahora se selecciona img3, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img3']) {
              // Se construye la ruta completa incluyendo 'web2/img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img3'];
              
              // Imprime el elemento img con la ruta completa
              echo '<img class="img-fluid rounded mb-5 mb-lg-0" src="' . htmlspecialchars($imagenPath) . '" alt="">';
          }
      }
      ?>

          </div>
          <div class="col-lg-7">
            <p class="section-title pr-5">
              <span>Sobre Nosotros</span>
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
      $query1 = "SELECT img4 FROM imagenes"; // Se selecciona img4, que contiene la ruta de la imagen
      $result1 = $pdo->query($query1);

      if ($result1) {
          $row = $result1->fetch(PDO::FETCH_ASSOC);

          if ($row['img4']) {
              // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
              $imagenPath = 'img/' . $row['img4'];
              
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

    <!-- Proyectos -->
<section id="projects" class="text-justify py-5">
  <div class="container">
    <?php 
  $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      // Asumiendo que la columna 'proyectos' contiene el título de la sección de proyectos.
      echo '<h2 class="display-5 text-center">' . htmlspecialchars($row["proyectos"]) . '</h2>';
  }
  ?>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="image-container" style="max-width: 80%; max-height: 800px; overflow: hidden; border-radius: 10px; margin-left: 40px; margin-top: 20px;">
            
          </div>
          <div class="card-body" style="text-align: justify;">
                      <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'mision' contiene el texto que quieres mostrar como misión.
                echo '<h5 class="card-title text-center">' . htmlspecialchars($row["mision"]) . '</h5>';
            }
            ?>
            <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido8' contiene el texto que quieres mostrar en el párrafo.
                echo '<p class="card-text">' . htmlspecialchars($row["contenido8"]) . '</p>';
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="image-container" style="max-width: 80%; max-height: 800px; overflow: hidden; border-radius: 10px; margin-left: 40px; margin-top: 20px;">
            
          </div>
          <div class="card-body" style="text-align: justify;">
          <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'mision' contiene el texto que quieres mostrar como misión.
                echo '<h5 class="card-title text-center">' . htmlspecialchars($row["vision"]) . '</h5>';
            }
            ?>
            <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido8' contiene el texto que quieres mostrar en el párrafo.
                echo '<p class="card-text">' . htmlspecialchars($row["contenido9"]) . '</p>';
            }
            ?>
            
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="image-container" style="max-width: 80%; max-height: 800px; overflow: hidden; border-radius: 10px; margin-left: 40px; margin-top: 20px;">
          </div>
          <div class="card-body" style="text-align: justify;">
            <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'mision' contiene el texto que quieres mostrar como misión.
                echo '<h5 class="card-title text-center">' . htmlspecialchars($row["ideario"]) . '</h5>';
            }
            ?>
            <?php 
          $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
          if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              // Asumiendo que la columna 'contenido8' contiene el texto que quieres mostrar en el párrafo.
              // La función nl2br convierte los saltos de línea en etiquetas <br> para HTML.
              echo '<p class="card-text">' . nl2br(htmlspecialchars($row["contenido10"])) . '</p>';
          }
          ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <?php 
    // Preparar la consulta y obtener los registros
    $result3 = $pdo->query($query3);
    $registros = $result3->fetchAll(PDO::FETCH_ASSOC);
    $numRegistros = count($registros); // Contar cuántos registros hay
    ?>
    <!-- Team Start -->
  <div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <h1 class="mb-4">Conoce a Nuestros Profesores</h1>
      </div>
      <div class="row">
        <?php foreach ($registros as $row): ?>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4 mx-auto"
              style="border-radius: 100%; width: 200px; height: 200px; overflow: hidden;"
            >
              <img class="img-fluid" src="./web2/img/<?= htmlspecialchars($row['foto']); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 100%;">
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <!-- Social icons can be placed here -->
              </div>
            </div>
            <h4><?= htmlspecialchars($row['nombre']); ?></h4>
            <i><?= htmlspecialchars($row['cargo']); ?></i>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Team End -->


    <?php 
// Preparar la consulta y obtener los registros
$result2 = $pdo->query($query2);
$registros = $result2->fetchAll(PDO::FETCH_ASSOC);
$numRegistros = count($registros); // Contar cuántos registros hay
?>

<!-- Testimonial Carousel Container -->
<div class="container-fluid py-5">
  <div class="container p-0">
    <div class="text-center pb-2">
      <h1 class="mb-4">Qué dicen los Padres!</h1>
    </div>
    <div class="owl-carousel testimonial-carousel">
      <?php foreach ($registros as $row): ?>
        <div class='testimonial-item'>
          <div class='testimonial-quote'>
            <p><?= htmlspecialchars($row['comentario']); ?></p>
          </div>
          <div class='testimonial-profile'>
            <img class='profile-img' src='./web2/img/<?= htmlspecialchars($row['foto']); ?>'>
            <div class='profile-info'>
              <h5><?= htmlspecialchars($row['nombre']); ?></h5>
              <i><?= htmlspecialchars($row['parentesco']); ?></i>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Detalles del Blog</span>
          </p>
          <h1 class="mb-4">¡Ultima Hora!</h1>
        </div>
        <div class="row pb-3">
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <?php
  $query1 = "SELECT img5 FROM imagenes"; // Se selecciona img5, que contiene la ruta de la imagen
  $result1 = $pdo->query($query1);

  if ($result1) {
      $row = $result1->fetch(PDO::FETCH_ASSOC);

      if ($row['img5']) {
          // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
          $imagenPath = 'img/' . $row['img5'];
          
          // Imprime el elemento img con la ruta completa
          echo '<img class="card-img-top mb-2" src="' . htmlspecialchars($imagenPath) . '" alt="">';
      }
  }
  ?>

              <div class="card-body bg-light text-center p-4">
            <?php 
        $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Asumiendo que la columna 'detalle1' contiene el texto que quieres mostrar como título en <h4>.
            echo '<h4 class="">' . htmlspecialchars($row["detalle1"]) . '</h4>';
        }
        ?>
                
          <?php 
      $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
          echo '<p>' . nl2br(htmlspecialchars($row["contenido11"])) . '</p>';
      }
      ?>

                <a href="single.php" class="btn btn-primary px-4 mx-auto my-2"
                  >Leer mas</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
                    <?php
        $query1 = "SELECT img6 FROM imagenes"; // Se selecciona img6, que contiene la ruta de la imagen
        $result1 = $pdo->query($query1);

        if ($result1) {
            $row = $result1->fetch(PDO::FETCH_ASSOC);

            if ($row['img6']) {
                // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
                $imagenPath = 'img/' . $row['img6'];
                
                // Imprime el elemento img con la ruta completa
                echo '<img class="card-img-top mb-2" src="' . htmlspecialchars($imagenPath) . '" alt="">';
            }
        }
        ?>

              <div class="card-body bg-light text-center p-4">
              <?php 
        $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Asumiendo que la columna 'detalle1' contiene el texto que quieres mostrar como título en <h4>.
            echo '<h4 class="">' . htmlspecialchars($row["detalle2"]) . '</h4>';
        }
        ?>
                
                <?php 
      $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
          echo '<p>' . nl2br(htmlspecialchars($row["contenido12"])) . '</p>';
      }
      ?>
                <a href="single.php" class="btn btn-primary px-4 mx-auto my-2"
                  >Leer mas</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
                <?php
    $query1 = "SELECT img7 FROM imagenes"; // Se selecciona img7, que contiene la ruta de la imagen
    $result1 = $pdo->query($query1);

    if ($result1) {
        $row = $result1->fetch(PDO::FETCH_ASSOC);

        if ($row['img7']) {
            // Se construye la ruta completa incluyendo 'img/' antes de la ruta obtenida de la base de datos
            $imagenPath = 'img/' . $row['img7'];
            
            // Imprime el elemento img con la ruta completa
            echo '<img class="card-img-top mb-2" src="' . htmlspecialchars($imagenPath) . '" alt="">';
        }
    }
    ?>

              <div class="card-body bg-light text-center p-4">
              <?php 
        $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Asumiendo que la columna 'detalle1' contiene el texto que quieres mostrar como título en <h4>.
            echo '<h4 class="">' . htmlspecialchars($row["detalle3"]) . '</h4>';
        }
        ?>
              
                    <?php 
            $result = $pdo->query($query); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["contenido13"])) . '</p>';
            }
            ?>
                <a href="single.php" class="btn btn-primary px-4 mx-auto my-2"
                  >Leer mas</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Blog End -->

    <!-- Footer Start -->
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
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <script>
$(document).ready(function() {
    var numItemsToShow = <?= $numRegistros; ?> > 3 ? 3 : <?= $numRegistros; ?>;
    
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        dots: true,
        loop: false, // No repite los elementos si no hay suficientes para el bucle
        center: false, // No centra los elementos, los alinea a la izquierda
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:numItemsToShow
            },
            992:{
                items:numItemsToShow
            }
        }
    });
});
</script>

   


  </body>
</html>
