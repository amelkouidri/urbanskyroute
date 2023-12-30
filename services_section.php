<?php
function afficherSectionServices()
{
    $serveur = "localhost:3307";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "urbanskyroute"; 
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    $query = "SELECT id_compagnie, nom_compagnie, description FROM compagnie";
    $result = $connexion->query($query);

    if ($result) {
        echo '<section class="services">';
        echo '<div class="container">';
        echo '<div class="row">';

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">';
            echo '<div class="icon-box icon-box-pink">';
            echo '<div class="icon"><i class="bx bxl-dribbble"></i></div>';
            echo '<h4 class="title"><a href="#">' . $row["nom_compagnie"] . '</a></h4>';
            echo '<p class="description">' . $row["description"] . '</p>';
            echo '</div>';
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
}
?>
