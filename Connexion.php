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

// Vérification de la présence des variables POST "user" et "pass"
if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    echo "Nom d'utilisateur et mot de passe non spécifiés.";
    exit();
}

// Utilisation de requête préparée pour éviter les attaques par injection SQL
$sql = "SELECT * FROM user WHERE username = ? AND motdepasse = ?";
$requete = $connexion->prepare($sql);

// Vous devrez remplacer "password" par le nom de la colonne où vous stockez les mots de passe dans votre table
$requete->bind_param("ss", $_POST["user"], $_POST["pass"]);

// Exécution de la requête
$requete->execute();

// Récupération des résultats
$resultat = $requete->get_result();

if ($resultat->num_rows > 0) {
    // Si l'utilisateur est trouvé, echo "Connexion réussie"
    echo "Connexion réussie";
} else {
    // Si l'utilisateur n'est pas trouvé, echo "Nom d'utilisateur ou mot de passe incorrect."
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermeture de la connexion
$connexion->close();
?>
