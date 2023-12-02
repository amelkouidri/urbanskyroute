<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UrbanSkyRoute - Gestion des Trajets</title>
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
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    h1 {
    color: #151111;
    font-size: 30px;
    margin-top: 100px; 
    margin-left: 10px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
      background-color: #f7f7f7;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px;
}

th {
  background-color:  #34495e;
  color: #fff;
  font-weight: bold;
  padding: 10px;
  text-align: center;
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
}

td {
  padding: 10px;
  text-align: center;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

button {
  display: inline-block;
  background-color: #34495e;
  border: 2px solid #2c3e50;
  color: #ffffff;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.3s;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  font-size: 14px;
  margin-right: 5px;
}

table {
  white-space: nowrap;
}

button:focus {
  animation: pulse 1s ease infinite;
}

@keyframes pulse {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
}



button:hover {
  background-color: rgb(91, 133, 177);
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

  <!-- Trajet Section -->
  <section id="trajet" class="trajet">
    <div class="container">
      <h1>Liste des Trajets</h1>
      <table border="1">
        <tr>
          <th>Point de Départ</th>
          <th>Point d'arrivee</th>
          <th>Type de Transport</th>
          <th>Horaire de depart </th>
          <th>Horaire d'arrivee </th>
          <th>Nombre de Passagers</th>
          <th>Actions</th>
        </tr>
        <tr>
          <td>Alger</td>
          <td>Paris</td>
          <td>Train</td>
          <td>08:00</td>
          <td>10:30</td>
          <td>50</td>
          <td>
            <button onclick="modifierTrajet(1)">Modifier</button>
            <button onclick="supprimerTrajet(1)">Supprimer</button>
          </td>
        </tr>
        <tr>
            <td>Alger</td>
            <td>Paris</td>
            <td>Train</td>
            <td>08:00</td>
            <td>10:30</td>
            <td>50</td>
            <td>
              <button onclick="modifierTrajet(1)">Modifier</button>
              <button onclick="supprimerTrajet(1)">Supprimer</button>
            </td>
          </tr>
          <tr>
            <td>Alger</td>
            <td>Paris</td>
            <td>Train</td>
            <td>08:00</td>
            <td>10:30</td>
            <td>50</td>
            <td>
              <button onclick="modifierTrajet(1)">Modifier</button>
              <button onclick="supprimerTrajet(1)">Supprimer</button>
            </td>
          </tr>
      </table>
      <button onclick="ajouterTrajet()">Ajouter un Trajet</button>

      <script>
          function modifierTrajet(trajetId) {
              // Code pour modifier le trajet
              alert("Modifier le trajet avec l'ID " + trajetId);
          }
  
          function supprimerTrajet(trajetId) {
              // Code pour supprimer le trajet
              alert("Supprimer le trajet avec l'ID " + trajetId);
          }
  
          function ajouterTrajet() {
              // Code pour ajouter un nouveau trajet
              alert("Ajouter un nouveau trajet");
          }
      </script>
    </div>
  </section>
  <script>
   function ajouterTrajet() {
           document.getElementById('modalAjout').style.display = 'block';
        }
        function sauvegarderAjout() {
    // Récupérer les valeurs du formulaire dans la fenêtre modale
    var depart = document.getElementById('depart-ajout');
    var arrivee = document.getElementById('arrivee-ajout');
    var typeTransport = document.getElementById('typeTransport-ajout');
    var heureDepart = document.getElementById('heureDepart-ajout');
    var heureArrivee = document.getElementById('heureArrivee-ajout');
    var nombrePassagers = parseInt(document.getElementById('nombrePassagers-ajout').value, 10);

    // Retirer la classe 'champ-vide' de tous les champs
    var champs = [depart, arrivee, typeTransport, heureDepart, heureArrivee];
    champs.forEach(function(champ) {
      champ.classList.remove('champ-vide');
    });

    // Vérifications des données
    if (!depart.value || !arrivee.value || !typeTransport.value || !heureDepart.value || !heureArrivee.value || isNaN(nombrePassagers) || nombrePassagers < 0) {
      alert("Veuillez remplir tous les champs correctement.");

      // Ajouter la classe 'champ-vide' aux champs vides
      champs.forEach(function(champ) {
        if (!champ.value.trim()) {
          champ.classList.add('champ-vide');
        }
      });

      return;
    }

    // Appliquer les modifications au trajet (vous devrez implémenter cette logique)
    document.getElementById('modalAjout').style.display = 'none';
    alert("L'ajout a été enregistré avec succès!");
  }
        function modifierTrajet(trajetId) {
          var trajet = {
              depart: "Point de départ initial",
              arrivee: "Point d'arrivée initial",
              typeTransport: "Type de transport initial",
              heureDepart: "Heure de départ initial",
              heureArrivee: "Heure d'arrivée initial",
              nombrePassagers: 3
            };
              // Remplacez les valeurs ci-dessus par celles que vous obtenez du trajet avec trajetId
            afficherFenetreModale(trajet);
          }

        function afficherFenetreModale(trajet) {
           // Remplissez le formulaire dans la fenêtre modale avec les détails du trajet
          document.getElementById('depart-modifier').value = trajet.depart;
          document.getElementById('arrivee-modifier').value = trajet.arrivee;
          document.getElementById('typeTransport-modifier').value = trajet.typeTransport;
          document.getElementById('heureDepart-modifier').value = trajet.heureDepart;
          document.getElementById('heureArrivee-modifier').value = trajet.heureArrivee;
          document.getElementById('nombrePassagers-modifier').value = trajet.nombrePassagers;
           document.getElementById('modalModif').style.display = 'block';
          }

  function sauvegarderModification() {
    // Récupérer les valeurs du formulaire dans la fenêtre modale
    var depart = document.getElementById('depart-modifier').value;
    var arrivee = document.getElementById('arrivee-modifier').value;
    var typeTransport = document.getElementById('typeTransport-modifier').value;
    var heureDepart = document.getElementById('heureDepart-modifier').value;
    var heureArrivee = document.getElementById('heureArrivee-modifier').value;
    var nombrePassagers = parseInt(document.getElementById('nombrePassagers-modifier').value, 10);

    // Vérifications des données
    if (isNaN(nombrePassagers) || nombrePassagers < 0) {
      alert("Le nombre de passagers doit être un entier positif.");
      return;
    }

    if (heureArrivee <= heureDepart) {
      alert("L'heure d'arrivée doit être supérieure à l'heure de départ.");
      return;
    }

    // Appliquer les modifications au trajet (vous devrez implémenter cette logique)
    // ...

    // Cacher la fenêtre modale après avoir appliqué les modifications
    document.getElementById('modalModif').style.display = 'none';

    // Afficher un message ou effectuer d'autres actions si nécessaire
    alert("Les modifications ont été enregistrées avec succès!");
  }

  
  function annuler() {
  document.getElementById('modalModif').style.display = 'none';
  document.getElementById('modalAjout').style.display = 'none';
}

// Fonction de suppression
function supprimerTrajet(trajetId) {
  var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce trajet ?");
  
  if (confirmation) {
    alert("Trajet avec l'ID " + trajetId + " supprimé !");
  } else {
    alert("Suppression annulée.");
  }
}


</script>
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
