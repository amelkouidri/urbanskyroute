<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Compagnies - UrbanSky Route</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet"><style>
        h3 {
            margin-left: 150px;
            margin-top: 100px; /* Ajustez la valeur pour décaler le titre vers le bas */
        }
    
        .city {
            width: 60px; /* Largeur du rectangle */
            height: 30px; /* Hauteur du rectangle */
            background-color: rgb(201, 201, 253);
            display: inline-block;
            margin: 50px 10px 0; /* Ajusté la marge du haut */
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px; /* Coins arrondis pour le rectangle */
        }
    
        .bus, .plane, .train {
            width: 100px;
            height: 2px;
            display: inline-block;
            margin: 50px 10px 0; /* Ajustez la marge du haut */
        }
    
        .bus {
            background-color: #007bff;
        }
    
        .plane {
            background-color: #ff5733 ;
        }
    
        .train {
            background-color: #009688;
        }
    
        .graph-container {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
    
        .legend {
            position: absolute;
            top: 580px; /* Ajustez la distance par rapport au haut */
            right: 180px; /* Ajustez la distance par rapport à droite */
            display: flex;
            flex-direction: row; /* Les légendes seront affichées horizontalement */
            align-items: center;
        }
    
        .legend div {
            width: 20px;
            height: 2px; /* Hauteur du trait */
            margin: 0px 5px; /* Espacement entre les légendes */
        }
    
        .bus-legend {
            background-color: #007bff; /* Couleur du trait pour le bus */
        }
    
        .plane-legend {
            background-color: #ff5733; /* Couleur du trait pour l'avion */
        }
    
        .train-legend {
            background-color: #009688; /* Couleur du trait pour le train */
        }
    
        .info-container {
            background-color: #34495e;
            border: 2px solid #2c3e50;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: #ecf0f1;
        }
    
        .info-container h3 {
            font-size: 24px;
            margin-top: 2px;
            margin-bottom: 10px;
            color: #3498db;
        }
    
        .info-container p {
            font-size: 18px;
            margin: 0 0 10px;
        }
    
        .info-container p:last-child {
            margin: 0;
        }
        .map {
      height: 400px;
      width: 100%;
    }
    </style>
    
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1 class="text-light"><span>UrbanSky Route</span></h1>
            </div>
            
      <?php
      include('navConnecte.php');
      //<!-- .navbar -->
      ?>
        </div>
    </header><!-- End Header -->
  
        <div class="map" id="map"></div>
    

    <h3>Votre trajet : </h3>
    <div class="container">
        <div class="graph-container">
            <div class="legend">
                <div class="bus-legend"></div> Bus
                <div class="plane-legend"></div> Avion
                <div class="train-legend"></div> Train
            </div>
            
            <div id="correspondences-graph">
                <div class="city">WilayaA</div>
                <div class="bus"></div>
                <div class="city">WilayaB</div>
                <div class="plane"></div>
                <div class="city">WilayaC</div>
                <div class="train"></div>
                <div class="city">WilayaD</div>
                <div class="plane"></div>
                <div class="city">WilayaA</div>
            </div>
           
        </div>
        <div class="info-container">
            <h3>Informations sur le trajet</h3>
            <p>Heure de départ : 08:00 AM</p>
            <p>Heure d'arrivée : 06:00 PM</p>
            <p>Temps estimé : 10 heures</p>
        </div>
    </div>

    
    <!-- ======= Services Section ======= -->
    <h3>Compagnies utilisees :</h3>
<section class="services">
    <div class="container">
  
      <div class="row">
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
          <div class="icon-box icon-box-pink">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="#">Air Algérie</a></h4>
            <p class="description">La compagnie nationale d'Algérie, Air Algérie, vous propose un moyen sûr et efficace de voyager par voie aérienne. Découvrez des vols intérieurs et internationaux de qualité.</p>
          </div>
        </div>
  
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box icon-box-cyan">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="#">SNTF</a></h4>
            <p class="description">La Société Nationale des Transports Ferroviaires (SNTF) est le choix idéal pour les voyages en train en Algérie. Profitez d'un réseau ferroviaire complet pour vos déplacements.</p>
          </div>
        </div>
  
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box icon-box-green">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="#">ETUSA</a></h4>
            <p class="description">L'Entreprise de Transport Urbain et Suburbain d'Alger (ETUSA) assure des services de transport en bus à Alger. Facilitez vos déplacements dans la capitale.</p>
          </div>
        </div>
  
      </div>
  
    </div>
  </section><!-- End Services Section -->
  
<!-- ======= Features Section ======= -->
<section class="features">
    <div class="container">
  
      <div class="section-title">
        <h2>Plus de details</h2>
    </div>
  
      <div class="row" data-aos="fade-up">
        <div class="col-md-5">
          <img src="etusa.png" class="img-fluid" alt="Service 1">
        </div>
        <div class="col-md-7 pt-4">
          <h3>Bus 1</h3>
          <p class="fst-italic">
            Voyagez en bus avec Urban Skyroute pour une expérience agréable et pratique.
          </p>
          <ul>
            <li><i class="bi bi-check"></i> Heure de départ : 09:00 AM</li>
            <li><i class="bi bi-check"></i> Heure d'arrivée : 01:00 PM</li>
            <li><i class="bi bi-check"></i> Nombre de passagers : 30</li>
            <li><i class="bi bi-check"></i> Type de véhicule : Autocar</li>
          </ul>
        </div>
      </div>
  
      <div class="row" data-aos="fade-up">
        <div class="col-md-5 order-1 order-md-2">
          <img src="airalgerie.png" class="img-fluid" alt="Service 2">
        </div>
        <div class="col-md-7 pt-5 order-2 order-md-1">
          <h3>Avion 1 </h3>
          <p class="fst-italic">
            Optez pour un voyage en avion avec Urban Skyroute pour gagner du temps.
          </p>
          <ul>
            <li><i class="bi bi-check"></i> Heure de départ : 07:30 AM</li>
            <li><i class="bi bi-check"></i> Heure d'arrivée : 10:30 AM</li>
            <li><i class="bi bi-check"></i> Nombre de passagers : 150</li>
            <li><i class="bi bi-check"></i> Type de véhicule : Avion</li>
          </ul>
        </div>
      </div>
  
      <div class="row" data-aos="fade-up">
        <div class="col-md-5">
          <img src="SNTF.png" class="img-fluid" alt="Service 3">
        </div>
        <div class="col-md-7 pt-5">
          <h3>Train 1</h3>
          <p>
            Optez pour des voyages en train confortables et économiques avec Urban Skyroute.
          </p>
          <ul>
            <li><i class="bi bi-check"></i> Heure de départ : 08:45 AM</li>
            <li><i class="bi bi-check"></i> Heure d'arrivée : 12:15 PM</li>
            <li><i class="bi bi-check"></i> Nombre de passagers : 80</li>
            <li><i class="bi bi-check"></i> Type de véhicule : Train</li>
          </ul>
        </div>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-md-5 order-1 order-md-2">
          <img src="airalgerie.png" class="img-fluid" alt="Service 2">
        </div>
        <div class="col-md-7 pt-5 order-2 order-md-1">
          <h3>Avion 2 </h3>
          <p class="fst-italic">
            Optez pour un voyage en avion avec Urban Skyroute pour gagner du temps.
          </p>
          <ul>
            <li><i class="bi bi-check"></i> Heure de départ : 07:30 AM</li>
            <li><i class="bi bi-check"></i> Heure d'arrivée : 10:30 AM</li>
            <li><i class="bi bi-check"></i> Nombre de passagers : 150</li>
            <li><i class="bi bi-check"></i> Type de véhicule : Avion</li>
          </ul>
        </div>
      </div>
  
    </div>
    
  </section><!-- End Features Section -->


  <!-- Google Maps JavaScript -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtaQUZuwVQLHpWIx-ry3HmGHnyL2Dkms&libraries=places"></script>
  <script>
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 0, lng: 0 }, // Coordonnées du centre de la carte
        zoom: 8, // Niveau de zoom initial
      });
    }

    // Appel à la fonction d'initialisation de la carte au chargement de la page
    google.maps.event.addDomListener(window, "load", initMap);
  </script>
  
</body>


<?php
      include('footer.php');
      //<!-- .navbar -->
      ?>
</html>
