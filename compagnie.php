<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Compagnies - UrbanSky Route</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1 class="text-light"><span>UrbanSky Route</span></h1>
      </div>
      <?php
      include('navConnecte.php');
      ?>
        </div>
    </div>
  </header><!-- End Header -->

  <main id="main">
  <section id="Team" class="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Nos Compagnies Partenaires</h2>
          <p>Découvrez les compagnies avec lesquelles nous collaborons pour vous offrir les meilleurs services.</p>
        </div>
      </div>

      <?php
      $serveur = "localhost:3307";
      $utilisateur = "root";
      $motDePasse = "";
      $baseDeDonnees = "urbanskyroute";
      $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

      if ($connexion->connect_error) {
          die("La connexion à la base de données a échoué : " . $connexion->connect_error);
      }

      $query = "SELECT id_compagnie, nom_compagnie, description, logo FROM compagnie";
      $result = $connexion->query($query);

      if ($result) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="blog-post">';
              echo '<div class="entry-img">';
              echo '<img src="'.$row["logo"].'" alt="Logo" class="img-fluid">';
              echo '</div>';
              echo '<h2 class="entry-title">' . $row["nom_compagnie"] . '</h2>';
              echo '<p class="entry-content">' . $row["description"] . '</p>';
              echo '</div>';
          }

          echo '</div>';
          echo '</div>';
          echo '</section>';

          $result->free();
      } else {
          echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
      }

      $connexion->close();
      ?>
    </div>
  </section>
</main>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

</body>
    <?php
              include('footer.php');
              ?>

</html>
