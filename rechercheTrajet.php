<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Compagnies - UrbanSky Route</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
  <style>
    /* Style pour le conteneur de la carte */
    .map {
      height: 400px;
    }
  
    /* Style pour le formulaire de recherche */
    form {
      background-color: #f5f5f5;
      padding: 20px;
      border-radius: 5px;
    }
  
    /* Style pour les champs de saisie */
    .form-group {
      margin-bottom: 15px;
    }
  
    label {
      display: block;
    }
  
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
  
    /* Style pour le bouton de recherche */
    button[type="submit"] {
      background-color: #1b2c41;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
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
    <div class="container" style="margin-top: 150px;">
        <h2>Recherche de Trajet</h2>
        <div class="row">
            <div class="col-md-4">
                <form action="" class="search-form">
                    <div class="form-group">
                        <label for="from">De</label>
                        <select id="from" name="from" required>
                            <option value="" disabled selected>Choisissez une wilaya</option>
                            <option value="wilaya1">Wilaya 1</option>
                            <option value="wilaya2">Wilaya 2</option>
                            <!-- Ajoutez les 58 wilayas ici -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to">À</label>
                        <select id="to" name="to" required>
                            <option value="" disabled selected>Choisissez une wilaya</option>
                            <option value="wilaya1">Wilaya 1</option>
                            <option value="wilaya2">Wilaya 2</option>
                            <!-- Ajoutez les 58 wilayas ici -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date de Voyage</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    
                    <script>
                        $(document).ready(function() {
                            
                            var dateInput = $('#date');
                            var today = new Date();
                            var formattedToday = getFormattedDate(today);
                            dateInput.attr('min', formattedToday);
                            
                            function getFormattedDate(date) {
                                var year = date.getFullYear();
                                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                                var day = ('0' + date.getDate()).slice(-2);
                                return year + '-' + month + '-' + day;
                            }
                        });
                    </script>
                    
                    </html>
                    
                    <button type="submit" id="recherchetrajet"><a href="trajet.html">Rechercher le trajet</a></button>
                </form>
            </div>
            
            <div class="col-md-8">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>

    <!-- Google Maps JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtaQUZuwVQLHpWIx-ry3HmGHnyL2Dkms&libraries=places"></script>
    <script>
     function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 28.0339, lng: 1.6596 }, // Coordonnées du centre de l'Algérie
    zoom: 4, // Niveau de zoom initial
    });
  }


      // Appel à la fonction d'initialisation de la carte au chargement de la page
      google.maps.event.addDomListener(window, "load", initMap);
    </script>
  <script>
     $(document).ready(function() {

       var dateInput = $('#date');
      var today = new Date();
      var formattedToday = getFormattedDate(today);
      dateInput.attr('min', formattedToday);

     function getFormattedDate(date) {
        var year = date.getFullYear();
        var month = ('0' + (date.getMonth() + 1)).slice(-2);
        var day = ('0' + date.getDate()).slice(-2);
        return year + '-' + month + '-' + day;
         }
         });
   </script>
<?php
      include('footer.php');
      //<!-- .navbar -->
      ?>

</body>
</html>
