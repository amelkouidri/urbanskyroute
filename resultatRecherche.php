<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compagnies - UrbanSky Route</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <!-- Favicon and Apple Touch Icon -->
    <link rel="icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom CSS Styles -->
    <style>

      /* Style pour le lien de recherche de trajet */
.centered-link {
    display: block;
    text-align: center;
    margin-top: 20px; /* Ajustez la marge selon vos préférences */
}

.centered-link a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db; /* Couleur de fond */
    color: #fff; /* Couleur du texte */
    text-decoration: none;
    border-radius: 5px; /* Coins arrondis */
    transition: background-color 0.3s ease; /* Animation de transition */
}

.centered-link a:hover {
    background-color: #2980b9; /* Couleur de fond au survol */
}

        .wilaya-table {
            border-spacing: 100px;
        }

        .wilaya-table td {
            padding: 10px;
        }

        h3 {
            margin-left: 150px;
            margin-top: 100px;
        }

        .city {
            width: 60px;
            height: 30px;
            background-color: rgb(201, 201, 253);
            display: inline-block;
            margin: 50px 10px 0;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
        }

        .bus, .plane, .train {
            width: 100px;
            height: 2px;
            display: inline-block;
            margin: 50px 10px 0;
        }

        .bus {
            background-color: #007bff;
        }

        .plane {
            background-color: #ff5733;
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
            top: 580px;
            right: 180px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .legend div {
            width: 20px;
            height: 2px;
            margin: 0px 5px;
        }

        .bus-legend {
            background-color: #007bff;
        }

        .plane-legend {
            background-color: #ff5733;
        }

        .train-legend {
            background-color: #009688;
        }

        .info-container {
            background-color: #34495e;
            border: 2px solid #2c3e50;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: #ecf0f1;
        }

        .info-container h3 {
            font-size: 24px;
            margin-top: 2px;
            margin-bottom: 10px;
            color: #3498db;
        }

        .map {
            height: 500px;
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
            <?php include('navConnecte.php'); ?>
        </div>
    </header>
 <div class="map" id="map"></div>

<?php
$serveur = "localhost:3307";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "urbanskyroute";
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wilayaFromNom = $_POST['from'];
    $wilayaToNom = $_POST['to'];
    $date = $_POST['date'];
    echo "<h3>Votre trajet entre $wilayaFromNom et $wilayaToNom à la date $date: </h3>";
}
?>

<div class="container">
    <div class="graph-container">
        <div class="legend">
            <div class="bus-legend"></div> Bus
            <div class="plane-legend"></div> Avion
            <div class="train-legend"></div> Train
        </div>
        <div id="correspondences-graph">
            <?php
            $direct = null ; 
            function afficherEtape($wilayaFrom, $compagnie, $wilayaTo) {
                echo "<div class='city'>$wilayaFrom</div>";
                switch ($compagnie) {
                    case 1:
                        echo "<div class='plane'></div>";
                        break;
                    case 2:
                        echo "<div class='bus'></div>";
                        break;
                    case 3:
                        echo "<div class='train'></div>";
                        break;
                }
                echo "<div class='city'>$wilayaTo</div>";
            }

            $wilayafromQuery = "SELECT id FROM wilaya WHERE nom = '$wilayaFromNom'";
            $wilayatoQuery = "SELECT id FROM wilaya WHERE nom = '$wilayaToNom'";

            $wilayafromResult = $connexion->query($wilayafromQuery);
            $wilayatoResult = $connexion->query($wilayatoQuery);

            if ($wilayafromResult && $wilayatoResult) {
                $wilayafromRow = $wilayafromResult->fetch_assoc();
                $wilayatoRow = $wilayatoResult->fetch_assoc();
                $wilayafrom = $wilayafromRow['id'];
                $wilayato = $wilayatoRow['id'];

                $directQuery = "SELECT t.id_trajet, p.id_compagnie FROM trajet t
                INNER JOIN propose p ON t.id_trajet = p.id_trajet
                WHERE t.wilaya_depart_id = $wilayafrom AND t.wilaya_arrivee_id = $wilayato AND t.date = '$date'";


                $resultDirect = $connexion->query($directQuery);

                if ($resultDirect->num_rows > 0) {
                    
                    $rowDirect = $resultDirect->fetch_assoc();
                    $idTrajetDirect = $rowDirect['id_trajet'];
                    $idCompagnieDirect = $rowDirect['id_compagnie'];

                    echo "Trajet direct trouvé :"; $direct = true;

                    afficherEtape($wilayafrom, $idCompagnieDirect, $wilayato);
                } else {
                    function trouverTrajets($wilayaActuelle, $wilayato, $cheminActuel, $wilayasIntermediaires , $date_trajet) {
                        global $connexion;
                        $correspondanceQuery = "SELECT * FROM trajet WHERE wilaya_depart_id = $wilayaActuelle AND date = '$date_trajet'";
                        $resultCorrespondance = $connexion->query($correspondanceQuery);

                        if ($resultCorrespondance) {
                            
                            while ($rowCorrespondance = $resultCorrespondance->fetch_assoc()) {
                                $idWilayaArriveeCorrespondance = $rowCorrespondance['wilaya_arrivee_id'];
                                $idTrajetCorrespondance = $rowCorrespondance['id_trajet'];
                                $dateTrajetCorrespondance = $rowCorrespondance['date']; 
                                
                        $date1 = new DateTime($dateTrajetCorrespondance);
                        $date2 =  new DateTime($date_trajet);
                                if ($date2 <= $date1) {
                        
                                    $possedQuery = "SELECT id_compagnie FROM propose WHERE id_trajet = $idTrajetCorrespondance";
                                    $resultPossed = $connexion->query($possedQuery);
                                
                                    if ($resultPossed->num_rows > 0) {
                                        $rowPossed = $resultPossed->fetch_assoc();
                                        $idCompagnieCorrespondance = $rowPossed['id_compagnie'];
                                        $nouveauChemin = $cheminActuel;
                                        $nouveauChemin[] = array(
                                            'wilayaFrom' => $wilayaActuelle,
                                            'compagnie' => $idCompagnieCorrespondance,
                                            'wilayaTo' => $idWilayaArriveeCorrespondance,
                                            'date' => $dateTrajetCorrespondance
                                        );                                        
                                        if ($idWilayaArriveeCorrespondance == $wilayato) {
                                            $wilayasIntermediaires[] = $nouveauChemin;
                                        } else {
                                            $wilayasIntermediaires = trouverTrajets($idWilayaArriveeCorrespondance, $wilayato, $nouveauChemin, $wilayasIntermediaires, $date_trajet);
                                        }
                                    }
                                }
                            }
                        }
                    
                        return $wilayasIntermediaires;
                    }

                    $wilayasIntermediaires = trouverTrajets($wilayafrom, $wilayato, array(), array(),$date);


                    if (!empty($wilayasIntermediaires)) {
                        echo "Trajets intermédiaires trouvés :<br>";
                        foreach ($wilayasIntermediaires as $chemin) {
                            foreach ($chemin as $etape) {
                                afficherEtape($etape['wilayaFrom'], $etape['compagnie'], $etape['wilayaTo']);
                            }
                            echo "<br>";
                        }
                    } else {
                        echo "Aucun trajet trouvé pour cette date .";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
</div>
</div>


    <div class="info-container">
    <h3>Informations sur le codage des wilayas</h3>
    <table class="wilaya-table">
        <?php
        $query = "SELECT * FROM wilaya";
        $result = $connexion->query($query);

        if ($result) {
            echo "<tr>"; 
            $counter = 0; 
            while ($row = $result->fetch_assoc()) {
                echo "<td>{$row['id']}:{$row['nom']}</td>";
                $counter++;
                if ($counter == 9) {
                    echo "</tr><tr>";
                    $counter = 0; 
                }
            }
            echo "</tr>"; 
            $result->free();
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
        }
        ?>
    </table>
</div>
</div>
  
<!-- ======= Features Section ======= -->
<section class="features">
    <div class="container">
  
      <div class="section-title">
        <h2>Plus de details</h2>
    </div>
    <?php
if($direct==false){
foreach ($wilayasIntermediaires as $chemin) {
    foreach ($chemin as $etape) {
        $wilayaFrom = $etape['wilayaFrom'];
        $wilayaTo = $etape['wilayaTo'];
        $query = "SELECT 
        t.heure_depart, t.heure_arrivee, t.wilaya_depart_id, t.wilaya_arrivee_id,
        p.id_compagnie, p.id_transport,t.date ,
        comp.nom_compagnie AS compagnie_nom,
        comp.logo AS compagnie_logo,  
        trans.type_transport, trans.nombre_passager
    FROM trajet t
    INNER JOIN propose p ON t.id_trajet = p.id_trajet
    INNER JOIN compagnie comp ON p.id_compagnie = comp.id_compagnie
    INNER JOIN transport trans ON p.id_transport = trans.id_transport
    WHERE t.wilaya_depart_id = $wilayaFrom AND t.wilaya_arrivee_id = $wilayaTo";

        $result = $connexion->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            echo '<div class="row" data-aos="fade-up">';
            echo '<div class="col-md-5">';
            echo "<img src='{$row['compagnie_logo']}' alt='Logo de la compagnie' style='max-width: 100px; max-height: 100px;'>";
            echo '</div>';
            echo '<div class="col-md-7 pt-4">';
            echo "<h3>{$row['compagnie_nom']}</h3>";
            echo '<p class="fst-italic">Description de l\'étape</p>';
            echo '<ul>';
            echo "<li><i class=\"bi bi-check\"></i> date du vol : {$row['date']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Heure de départ : {$row['heure_depart']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Heure d'arrivée : {$row['heure_arrivee']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Type de transport : {$row['type_transport']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Nombre de passagers : {$row['nombre_passager']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Wilaya de départ : {$row['wilaya_depart_id']}</li>";
            echo "<li><i class=\"bi bi-check\"></i> Wilaya d'arrivée : {$row['wilaya_arrivee_id']}</li>";
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "Erreur lors de la récupération des informations sur l'étape.";
        }
    }
    echo "<br>";
}}
else {
  $query = "SELECT 
      t.heure_depart, t.heure_arrivee, t.wilaya_depart_id, t.wilaya_arrivee_id,
      p.id_compagnie, p.id_transport,
      comp.nom_compagnie AS compagnie_nom,
      comp.logo AS compagnie_logo,  
      trans.type_transport, trans.nombre_passager
  FROM trajet t
  INNER JOIN propose p ON t.id_trajet = p.id_trajet
  INNER JOIN compagnie comp ON p.id_compagnie = comp.id_compagnie
  INNER JOIN transport trans ON p.id_transport = trans.id_transport
  WHERE t.wilaya_depart_id = (SELECT id FROM wilaya WHERE nom = '$wilayaFromNom') 
  AND t.wilaya_arrivee_id = (SELECT id FROM wilaya WHERE nom = '$wilayaToNom')";

  $result = $connexion->query($query);

  if ($result && $row = $result->fetch_assoc()) {
      echo '<div class="row" data-aos="fade-up">';
      echo '<div class="col-md-5">';
      echo "<img src='{$row['compagnie_logo']}' alt='Logo de la compagnie' style='max-width: 100px; max-height: 100px;'>";
      echo '</div>';
      echo '<div class="col-md-7 pt-4">';
      echo "<h3>{$row['compagnie_nom']}</h3>";
      echo '<p class="fst-italic">Description de l\'étape</p>';
      echo '<ul>';
      echo "<li><i class=\"bi bi-check\"></i> Heure de départ : {$row['heure_depart']}</li>";
      echo "<li><i class=\"bi bi-check\"></i> Heure d'arrivée : {$row['heure_arrivee']}</li>";
      echo "<li><i class=\"bi bi-check\"></i> Type de transport : {$row['type_transport']}</li>";
      echo "<li><i class=\"bi bi-check\"></i> Nombre de passagers : {$row['nombre_passager']}</li>";
      echo "<li><i class=\"bi bi-check\"></i> Wilaya de départ : {$row['wilaya_depart_id']}</li>";
      echo "<li><i class=\"bi bi-check\"></i> Wilaya d'arrivée : {$row['wilaya_arrivee_id']}</li>";
      echo '</ul>';
      echo '</div>';
      echo '</div>';
  } else {
      echo "Erreur lors de la récupération des informations sur l'étape.";
  }
}

?>
</div>
<div class="centered-link">
    <a href="RechercheTrajet.php">Rechercher un autre trajet</a>
</div>

</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtaQUZuwVQLHpWIx-ry3HmGHnyL2Dkms&libraries=places" async defer></script>
<div id="map" style="height: 400px;"></div>

<script>
   function initMap() {
 <?php
$resultLatFrom = $connexion->query("SELECT latitude FROM wilaya WHERE nom = '$wilayaFromNom'");
if ($resultLatFrom) {
    $rowLatFrom = $resultLatFrom->fetch_assoc();
    $latFrom = $rowLatFrom['latitude'];
} else {
    $latFrom = 0;
}

$resultLngFrom = $connexion->query("SELECT longitude FROM wilaya WHERE nom = '$wilayaFromNom'");
if ($resultLngFrom) {
    $rowLngFrom = $resultLngFrom->fetch_assoc();
    $lngFrom = $rowLngFrom['longitude'];
} else {
    $lngFrom = 0;
}

$resultLatTo = $connexion->query("SELECT latitude FROM wilaya WHERE nom = '$wilayaToNom'");
if ($resultLatTo) {
    $rowLatTo = $resultLatTo->fetch_assoc();
    $latTo = $rowLatTo['latitude'];
} else {
    $latTo = 0;
}

$resultLngTo = $connexion->query("SELECT longitude FROM wilaya WHERE nom = '$wilayaToNom'");
if ($resultLngTo) {
    $rowLngTo = $resultLngTo->fetch_assoc();
    $lngTo = $rowLngTo['longitude'];
} else {
    $lngTo = 0;
}
?>

    var depart = { lat: <?php echo $latFrom; ?>, lng: <?php echo $lngFrom; ?> };
var arrivee = { lat: <?php echo $latTo; ?>, lng: <?php echo $lngTo; ?> };


      var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 5,
         center: depart
      });

      var marqueurDepart = new google.maps.Marker({
         position: depart,
         map: map,
         title: 'Départ'
      });

      var marqueurArrivee = new google.maps.Marker({
         position: arrivee,
         map: map,
         title: 'Arrivée'
      });

  
      var trajet = new google.maps.Polyline({
         path: [depart, arrivee],
         geodesic: true,
         strokeColor: '#FF0000', 
         strokeOpacity: 1.0,
         strokeWeight: 2
      });

      trajet.setMap(map);
   }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtaQUZuwVQLHpWIx-ry3HmGHnyL2Dkms&callback=initMap"></script>
</body>


 
<?php include('footer.php'); ?>
</html>
