<?php
$serveur = "localhost:3307";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "urbanskyroute";
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}
?>

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
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style pour le titre "Recherche de Trajet" */
        h2 {
            font-size: 24px;
            margin-top: 20px;
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
              ?>
        </div>
    </header><!-- End Header -->
    <div class="container">
        <h2>Recherche de Trajet</h2>
        <div class="row">
            <div class="col-md-4">
                <form action="trajet.php" method="post" class="search-form">
                    <div class="form-group">
                        <label for="from">De</label>
                        <select id="from" name="from" required>
                            <option value="" disabled selected>Choisissez une wilaya</option>
                            <?php
                            $sql = "SELECT nom FROM wilaya";
                            $result = $connexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["nom"] . '">' . $row["nom"] . '</option>';
                                }
                            } else {
                                echo "Aucune wilaya trouvée dans la base de données.";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to">À</label>
                        <select id="to" name="to" required>
                            <option value="" disabled selected>Choisissez une wilaya</option>
                            <?php
                            $sql = "SELECT nom FROM wilaya";
                            $result = $connexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["nom"] . '">' . $row["nom"] . '</option>';
                                }
                            } else {
                                echo "Aucune wilaya trouvée dans la base de données.";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="date">Date de Voyage</label>
                    <input type="date" id="date" name="date" required>
                    </div>
                    <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    var dateInput = document.getElementById('date');
                    var currentDate = new Date().toISOString().split('T')[0];
                    dateInput.min = currentDate;
                   });
                  </script>


                    <button type="submit">Rechercher le trajet</a></button>
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
              center: { lat: 28.0339, lng: 1.6596 }, // Coordonnées de lalgerie 
                zoom: 4, // Niveau de zoom initial
            });
        }

        google.maps.event.addDomListener(window, "load", initMap);
    </script>

</body>
</html>
