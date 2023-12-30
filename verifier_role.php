<?php
$serveur = "localhost:3307";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "urbanskyroute";

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

$username = $_POST['user'];
$sql = "SELECT role FROM user WHERE username = ?";
$requete = $connexion->prepare($sql);
$requete->bind_param("s", $username);
$requete->execute();
$requete->bind_result($role);
$requete->fetch();
$requete->close();

if ($role === 'user') {
    echo 'user';
} elseif ($role === 'admin') {
    echo 'admin';
} else {
    echo 'unknown';
}

$connexion->close();
?>
