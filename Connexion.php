
<?php
//******************************************************************************************** */
$serveur = "localhost:3307";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "urbanskyroute";
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    echo "Nom d'utilisateur et mot de passe non spécifiés.";
    exit();
}

$sql = "SELECT * FROM user WHERE username = ? AND motdepasse = ?";
$requete = $connexion->prepare($sql);

$requete->bind_param("ss", $_POST["user"], $_POST["pass"]);

$requete->execute();

$resultat = $requete->get_result();

if ($resultat->num_rows > 0) {
    echo "Connexion réussie";
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}
$connexion->close();
?>
