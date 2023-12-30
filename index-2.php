<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UrbanSkyRoute - Recherche de Trajets Aériens et Urbains</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>UrbanSkyRoute</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <?php
      include('navConnecte.php');
      //<!-- .navbar -->
      ?>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
     <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bienvenue sur <span>UrbanSkyRoute </span></h2>
          <p class="animate__animated animate__fadeInUp">Trouvez et visualisez des trajets aériens et urbains pour voyager de manière efficace et pratique. Utilisez notre service pour planifier vos déplacements en ville.</p>
          <a href=ConnexionPage.php" class="btn-get-started animate__animated animate__fadeInUp">Commencer la recherche</a>
         </div>
     </div>


      <!-- Slide 2 -->
      <div class="carousel-item">
         <div class="carousel-container">
         <h2 class="animate__animated animate__fadeInDown">Planifiez Vos Trajets</h2>
         <p class="animate__animated animate__fadeInUp">Trouvez des vols, trains et bus pour vous rendre à destination. Notre service simplifie la recherche de trajets urbains pour que vous puissiez voyager en toute tranquillité.</p>
         <a href="ConnexionPage.php" class="btn-get-started animate__animated animate__fadeInUp">Commencer la recherche</a>
       </div>
     </div>


      <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="carousel-container">
       <h2 class="animate__animated animate__fadeInDown">Trouvez Votre Itinéraire Idéal</h2>
        <p class="animate__animated animate__fadeInUp">Découvrez les meilleures options de trajet pour vos déplacements en ville. Notre plateforme vous aide à trouver les itinéraires les plus pratiques et efficaces.</p>
        <a href="ConnexionPage.php" class="btn-get-started animate__animated animate__fadeInUp">Commencer la recherche</a>
      </div>
    </div>


      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
  <section class="services">
      <div class="container">
          <div class="row">
              <?php
              include('services_section.php'); 
              afficherSectionServices();
              ?>
          </div>
      </div>
  </section>


<!-- ======= Why Us Section ======= -->
<section class="why-us section-bg" data-aos="fade-up" data-aos-delay="200">
  <div class="container">

    <div class="row">
      <div class="col-lg-6 video-box">
        <img src="assets/img/urbanskyroute-why-us.jpg" class="img-fluid" alt="Urban Skyroute - Pourquoi nous choisir">
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

        <div class="icon-box">
          <div class="icon"><i class="bx bx-rocket"></i></div>
          <h4 class="title"><a href="#">Pourquoi Urban Skyroute ?</a></h4>
          <p class="description">Urban Skyroute est votre choix idéal pour des voyages sûrs, rapides et confortables. Découvrez pourquoi nous sommes la meilleure option pour vos déplacements urbains et suburbains.</p>
        </div>

        <div class="icon-box">
          <div class="icon"><i class="bx bx-heart"></i></div>
          <h4 class="title"><a href="#">Nos avantages</a></h4>
          <p class="description">Nous nous engageons à vous offrir une expérience de voyage exceptionnelle. Découvrez les nombreux avantages de choisir Urban Skyroute pour vos trajets.</p>
        </div>

      </div>
    </div>

  </div>
</section><!-- End Why Us Section -->


<!-- ======= Features Section ======= -->
<section class="features">
  <div class="container">

    <div class="section-title">
      <h2>Nos Services</h2>
      <p>Urban Skyroute offre une gamme de services exceptionnels pour simplifier vos déplacements. Découvrez ce que nous avons à offrir :</p>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5">
        <img src="assets/img/urbanskyroute-features-1.svg" class="img-fluid" alt="Service 1">
      </div>
      <div class="col-md-7 pt-4">
        <h3>Voyages confortables</h3>
        <p class="fst-italic">
          Chez Urban Skyroute, nous mettons l'accent sur le confort de nos passagers, en offrant des sièges spacieux et un intérieur accueillant.
        </p>
        <ul>
          <li><i class="bi bi-check"></i> Sièges confortables pour un voyage relaxant.</li>
          <li><i class="bi bi-check"></i> Intérieur élégant pour une expérience de voyage agréable.</li>
        </ul>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5 order-1 order-md-2">
        <img src="assets/img/urbanskyroute-features-2.svg" class="img-fluid" alt="Service 2">
      </div>
      <div class="col-md-7 pt-5 order-2 order-md-1">
        <h3>Horaires flexibles</h3>
        <p class="fst-italic">
          Nous comprenons que votre temps est précieux. C'est pourquoi nous proposons des horaires flexibles pour s'adapter à votre emploi du temps.
        </p>
        <p>
          Urban Skyroute vous offre des horaires variés pour répondre à vos besoins. Vous pouvez voyager quand cela vous convient le mieux.
        </p>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5">
        <img src="assets/img/urbanskyroute-features-3.svg" class="img-fluid" alt="Service 3">
      </div>
      <div class="col-md-7 pt-5">
        <h3>Tarifs compétitifs</h3>
        <p>Nous croyons en des tarifs abordables pour tous. Profitez de nos prix compétitifs pour vos déplacements quotidiens.</p>
        <ul>
          <li><i class="bi bi-check"></i> Tarifs abordables pour tous les budgets.</li>
          <li><i class="bi bi-check"></i> Réductions pour les voyages fréquents.</li>
        </ul>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5 order-1 order-md-2">
        <img src="assets/img/urbanskyroute-features-4.svg" class="img-fluid" alt="Service 4">
      </div>
      <div class="col-md-7 pt-5 order-2 order-md-1">
        <h3>Expérience inoubliable</h3>
        <p class="fst-italic">
          Nous nous engageons à rendre votre voyage mémorable. Découvrez la différence Urban Skyroute dès votre premier trajet.
        </p>
        <p>
          Urban Skyroute offre bien plus qu'un simple transport. Nous offrons une expérience de voyage inoubliable, de bout en bout.
        </p>
      </div>
    </div>

  </div>
</section><!-- End Features Section -->


  </main><!-- End #main -->

  <?php
      include('footer.php');
      //<!-- .navbar -->
      ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
