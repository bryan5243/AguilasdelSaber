<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title> Aguilas del Saber</title>
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
    $query = "SELECT * FROM galeria";
    $result = $pdo->query($query);

    include_once('web2/model/conexion.php');
    // Obtener datos de la base de datos
    $query2 = "SELECT * FROM general";
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
      $result2 = $pdo->query($query2);
      while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
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
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Galeria</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Inicio</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Galeria</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <?php 
    // Preparar la consulta y obtener los registros
    $result = $pdo->query($query);
    $registros = $result->fetchAll(PDO::FETCH_ASSOC);
    $numRegistros = count($registros); // Contar cuántos registros hay
    ?>

    <!-- Gallery Start -->
    <div class="container-fluid pt-5 pb-3">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Nuestra Galeria</span>
          </p>
          <h1 class="mb-4">Galeria de Nuestros Momentos</h1>
        </div>

      
        <div class="row portfolio-container">
          <?php foreach ($registros as $row): ?>
            <div class="col-lg-4 col-md-6 mb-4 portfolio-item ">
              <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="./web2/img/<?= htmlspecialchars($row['foto']); ?>" />
              
                <div
                  class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
                >
                <a href="./web2/img/<?= htmlspecialchars($row['foto']); ?>" data-lightbox="portfolio">
                    <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!-- Gallery End -->

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
      $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
      if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
          // Asumiendo que la columna 'footer1' contiene el texto que quieres mostrar en el span.
          echo '<span class="text-white">' . htmlspecialchars($row["footer1"]) . '</span>';
      }
      ?>

          </a>
          <?php 
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                // Asumiendo que la columna 'contenido11' contiene el texto que quieres mostrar en el párrafo.
                echo '<p>' . nl2br(htmlspecialchars($row["contenido14"])) . '</p>';
            }
            ?>
          <?php 
  $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
  if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
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
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
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
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
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
            $result2 = $pdo->query($query2); // Asegúrate de que esta variable contiene la consulta SQL adecuada.
            if ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
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
