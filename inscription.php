<?php
$serveur = "localhost:3307";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "urbanskyroute";

// Utilisation de mysqli avec l'option de gestion des erreurs
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Vérification de la présence des variables POST "user", "pass", et "email"
if (!isset($_POST["user"]) || !isset($_POST["pass"]) || !isset($_POST["email"])) {
    echo "Veuillez remplir tous les champs.";
    exit();
}

// Utilisation de requête préparée pour éviter les attaques par injection SQL
$sql = "INSERT INTO user (username, motdepasse , mail ,role) VALUES (?, ?, ?,'user')";
$requete = $connexion->prepare($sql);

// Vous devrez remplacer "password" et "email" par les noms de vos colonnes correspondantes
$requete->bind_param("sss", $_POST["user"], $_POST["pass"], $_POST["email"]);

// Exécution de la requête
$requete->execute();

// Vérification du succès de l'inscription
if ($requete->affected_rows > 0) {
    echo "Inscription réussie";
} else {
    echo "Erreur lors de l'inscription. Veuillez réessayer.";
}

// Fermeture de la connexion
$connexion->close();
?>
