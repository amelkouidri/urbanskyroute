<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UrbanSkyRoute - Tables</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
      .champ-vide {
        border: 1px solid red;
      }
    </style>
    <style>
      .modalModif,
      .modalAjout, 
      .modalSuppr {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 1000;
        height: 630px;
        width: 550px;
        max-width: 100%;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .modalModif h2,
      .modalAjout h2, 
      .modalSuppr h2 {
        color: #151111;
        font-size: 24px;
        margin-bottom: 20px;
      }

      .modalModif label,
      .modalAjout label,
      .modalSuppr label {
        display: block;
        margin-bottom: 5px;
      }

      .modalModif select,
      .modalAjout select,
      .modalModif input,
      .modalAjout input,
      .modalSuppr input{
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }

      .modalModif .buttons,
      .modalAjout .buttons,
      .modalSuppr .buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .modalModif button,
      .modalAjout button, .modalSuppr button {
        background-color: #34495e;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .modalModif button:hover,
      .modalAjout button:hover, .modalSuppr button:hover {
        background-color: rgb(91, 133, 177);
      }

      .modalModif .cancel-btn,
      .modalAjout .cancel-btn, .modalSuppr .cancel-btn {
        background-color: #ccc;
        color: #fff;
      }

      /* Styles pour la liste des trajets */
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
        background-color: #34495e;
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

        0%,
        100% {
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
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Urban Skyroute <sup>Admin</sup>
          </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="index2.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tableaux</span>
            <a class="nav-link" href="../index.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Home</span></a>
          </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Barre de basculement du volet latéral -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
            </ul>
          </nav>
          <div class="container-fluid">
            <section id="trajet" class="trajet">
              <div class="container">
                <h1>Liste des Trajets</h1>

                <?php
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "urbanskyroute";

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configurer PDO pour afficher les erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour récupérer les trajets
    $stmt = $conn->query("SELECT * FROM trajet");
    $trajets = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des trajets : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>

<table border="1">
    <tr>
        <th>Point de Départ</th>
        <th>Point d'arrivée</th>
        <th>Type de Transport</th>
        <th>Horaire de départ</th>
        <th>Horaire d'arrivée</th>
        <th>Nombre de Passagers</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($trajets as $trajet) : ?>
        <tr>
            <td><?php echo $trajet['wilaya_depart']; ?></td>
            <td><?php echo $trajet['wilaya_arrivee']; ?></td>
            <td>Train</td>
            <td><?php echo $trajet['heure_depart']; ?></td>
            <td><?php echo $trajet['heure_arrivee']; ?></td>
            <td><?php echo $trajet['nombre_passager']; ?></td>
            <td>
                <button onclick="modifierTrajet(<?php echo $trajet['id_trajet']; ?>)">Modifier</button>
                <button onclick="supprimerTrajet(<?php echo $trajet['id_trajet']; ?>)">Supprimer</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

                <button onclick="ajouterTrajet()">Ajouter un Trajet</button>
                
                
                <!-- FENETRE MODIFIER -->
                <div class="modalModif" id="modalModif">
                  <h2>Modifier le trajet</h2>
                  <form action="#" method="post">
                  <input type="hidden" id="id_trajet" name="id_trajet" value="">
                    <label for="depart-modifier">Point de départ:</label>
                    <select id="depart-modifier" name="depart-modifier" required>
                    <option value="" disabled selected>Choisissez une wilaya</option>
                    <option value="Chlef">Chlef</option>
                      <option value="Laghouat">Laghouat</option>
                      <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                      <option value="Batna">Batna</option>
                      <option value="Béjaïa">Béjaïa</option>
                      <option value="Biskra">Biskra</option>
                      <option value="Béchar">Béchar</option>
                      <option value="Blida">Blida</option>
                      <option value="Bouira">Bouira</option>
                      <option value="Tamanrasset">Tamanrasset</option>
                      <option value="Tébessa">Tébessa</option>
                      <option value="Tlemcen">Tlemcen</option>
                      <option value="Tiaret">Tiaret</option>
                      <option value="Tizi Ouzou">Tizi Ouzou</option>
                      <option value="Alger">Alger</option>
                      <option value="Djelfa">Djelfa</option>
                      <option value="Jijel">Jijel</option>
                      <option value="Sétif">Sétif</option>
                      <option value="Saïda">Saïda</option>
                      <option value="Skikda">Skikda</option>
                      <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                      <option value="Annaba">Annaba</option>
                      <option value="Guelma">Guelma</option>
                      <option value="Constantine">Constantine</option>
                      <option value="Médéa">Médéa</option>
                      <option value="Mostaganem">Mostaganem</option>
                      <option value="M'Sila">M'Sila</option>
                      <option value="Mascara">Mascara</option>
                      <option value="Ouargla">Ouargla</option>
                      <option value="Oran">Oran</option>
                      <option value="El Bayadh">El Bayadh</option>
                      <option value="Illizi">Illizi</option>
                      <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                      <option value="Boumerdès">Boumerdès</option>
                      <option value="El Tarf">El Tarf</option>
                      <option value="Tindouf">Tindouf</option>
                      <option value="Tissemsilt">Tissemsilt</option>
                      <option value="El Oued">El Oued</option>
                      <option value="Khenchela">Khenchela</option>
                      <option value="Souk Ahras">Souk Ahras</option>
                      <option value="Tipaza">Tipaza</option>
                      <option value="Mila">Mila</option>
                      <option value="Aïn Defla">Aïn Defla</option>
                      <option value="Naâma">Naâma</option>
                      <option value="Aïn Témouchent">Aïn Témouchent</option>
                      <option value="Ghardaïa">Ghardaïa</option>
                      <option value="Relizane">Relizane</option>

                    </select>
                    <label for="arrivee-modifier">Point d'arrivée:</label>
                    <select id="arrivee-modifier" name="arrivee-modifier" required>
                    <option value="" disabled selected>Choisissez une wilaya</option>
                    <option value="Chlef">Chlef</option>
                    <option value="Laghouat">Laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="Béjaïa">Béjaïa</option>
                    <option value="Biskra">Biskra</option>
                    <option value="Béchar">Béchar</option>
                    <option value="Blida">Blida</option>
                    <option value="Bouira">Bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tébessa">Tébessa</option>
                    <option value="Tlemcen">Tlemcen</option>
                    <option value="Tiaret">Tiaret</option>
                    <option value="Tizi Ouzou">Tizi Ouzou</option>
                    <option value="Alger">Alger</option>
                    <option value="Djelfa">Djelfa</option>
                    <option value="Jijel">Jijel</option>
                    <option value="Sétif">Sétif</option>
                    <option value="Saïda">Saïda</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                    <option value="M'Sila">M'Sila</option>
                    <option value="Mascara">Mascara</option>
                    <option value="Ouargla">Ouargla</option>
                    <option value="Oran">Oran</option>
                    <option value="El Bayadh">El Bayadh</option>
                    <option value="Illizi">Illizi</option>
                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                    <option value="Boumerdès">Boumerdès</option>
                    <option value="El Tarf">El Tarf</option>
                    <option value="Tindouf">Tindouf</option>
                    <option value="Tissemsilt">Tissemsilt</option>
                    <option value="El Oued">El Oued</option>
                    <option value="Khenchela">Khenchela</option>
                    <option value="Souk Ahras">Souk Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Aïn Defla">Aïn Defla</option>
                    <option value="Naâma">Naâma</option>
                    <option value="Aïn Témouchent">Aïn Témouchent</option>
                    <option value="Ghardaïa">Ghardaïa</option>
                    <option value="Relizane">Relizane</option>

                    </select>
                    <label for="typeTransport-modifier">Type de transport:</label>
                    <input type="text" id="typeTransport-modifier" name="typeTransport-modifier" required>
                    <label for="heureDepart-modifier">Heure de départ:</label>
                    <input type="time" id="heureDepart-modifier" name="heureDepart-modifier" required>
                    <label for="heureArrivee-modifier">Heure d'arrivée:</label>
                    <input type="time" id="heureArrivee-modifier" name="heureArrivee-modifier" required>
                    <label for="nombrePassagers-modifier">Nombre de passagers:</label>
                    <input type="number" id="nombrePassagers-modifier" name="nombrePassagers-modifier" required>
                    <div class="buttons">
                      <button type="submit" name="sauvegarderModification" onclick="sauvegarderModification()">Enregistrer</button>
                      <button type="button" class="cancel-btn" onclick="annuler()">Annuler</button>
                    </div>
                  </form>
                </div>


                <!-- FENETRE AJOUTER -->
                <div class="modalAjout" id="modalAjout">
                  <h2>Ajouter un trajet</h2>
                  <form action="#" method="post">
                    <label for="depart-ajout">Point de départ:</label>
                    <select id="depart-ajout" name="depart-ajout" required>
                      <<option value="wilaya1">Adrar</option>
                      <option value="Chlef">Chlef</option>
                      <option value="Laghouat">Laghouat</option>
                      <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                      <option value="Batna">Batna</option>
                      <option value="Béjaïa">Béjaïa</option>
                      <option value="Biskra">Biskra</option>
                      <option value="Béchar">Béchar</option>
                      <option value="Blida">Blida</option>
                      <option value="Bouira">Bouira</option>
                      <option value="Tamanrasset">Tamanrasset</option>
                      <option value="Tébessa">Tébessa</option>
                      <option value="Tlemcen">Tlemcen</option>
                      <option value="Tiaret">Tiaret</option>
                      <option value="Tizi Ouzou">Tizi Ouzou</option>
                      <option value="Alger">Alger</option>
                      <option value="Djelfa">Djelfa</option>
                      <option value="Jijel">Jijel</option>
                      <option value="Sétif">Sétif</option>
                      <option value="Saïda">Saïda</option>
                      <option value="Skikda">Skikda</option>
                      <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                      <option value="Annaba">Annaba</option>
                      <option value="Guelma">Guelma</option>
                      <option value="Constantine">Constantine</option>
                      <option value="Médéa">Médéa</option>
                      <option value="Mostaganem">Mostaganem</option>
                      <option value="M'Sila">M'Sila</option>
                      <option value="Mascara">Mascara</option>
                      <option value="Ouargla">Ouargla</option>
                      <option value="Oran">Oran</option>
                      <option value="El Bayadh">El Bayadh</option>
                      <option value="Illizi">Illizi</option>
                      <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                      <option value="Boumerdès">Boumerdès</option>
                      <option value="El Tarf">El Tarf</option>
                      <option value="Tindouf">Tindouf</option>
                      <option value="Tissemsilt">Tissemsilt</option>
                      <option value="El Oued">El Oued</option>
                      <option value="Khenchela">Khenchela</option>
                      <option value="Souk Ahras">Souk Ahras</option>
                      <option value="Tipaza">Tipaza</option>
                      <option value="Mila">Mila</option>
                      <option value="Aïn Defla">Aïn Defla</option>
                      <option value="Naâma">Naâma</option>
                      <option value="Aïn Témouchent">Aïn Témouchent</option>
                      <option value="Ghardaïa">Ghardaïa</option>
                      <option value="Relizane">Relizane</option>

                    </select>
                    <label for="arrivee-ajout">Point d'arrivée:</label>
                    <select id="arrivee-ajout" name="arrivee-ajout" required>
                    <option value="Chlef">Chlef</option>
                    <option value="Laghouat">Laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="Béjaïa">Béjaïa</option>
                    <option value="Biskra">Biskra</option>
                    <option value="Béchar">Béchar</option>
                    <option value="Blida">Blida</option>
                    <option value="Bouira">Bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tébessa">Tébessa</option>
                    <option value="Tlemcen">Tlemcen</option>
                    <option value="Tiaret">Tiaret</option>
                    <option value="Tizi Ouzou">Tizi Ouzou</option>
                    <option value="Alger">Alger</option>
                    <option value="Djelfa">Djelfa</option>
                    <option value="Jijel">Jijel</option>
                    <option value="Sétif">Sétif</option>
                    <option value="Saïda">Saïda</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                    <option value="M'Sila">M'Sila</option>
                    <option value="Mascara">Mascara</option>
                    <option value="Ouargla">Ouargla</option>
                    <option value="Oran">Oran</option>
                    <option value="El Bayadh">El Bayadh</option>
                    <option value="Illizi">Illizi</option>
                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                    <option value="Boumerdès">Boumerdès</option>
                    <option value="El Tarf">El Tarf</option>
                    <option value="Tindouf">Tindouf</option>
                    <option value="Tissemsilt">Tissemsilt</option>
                    <option value="El Oued">El Oued</option>
                    <option value="Khenchela">Khenchela</option>
                    <option value="Souk Ahras">Souk Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Aïn Defla">Aïn Defla</option>
                    <option value="Naâma">Naâma</option>
                    <option value="Aïn Témouchent">Aïn Témouchent</option>
                    <option value="Ghardaïa">Ghardaïa</option>
                    <option value="Relizane">Relizane</option>

                    </select>
                    <label for="typeTransport-ajout">Type de transport:</label>
                    <input type="text" id="typeTransport-ajout" required>
                    <label for="heureDepart-ajout">Heure de départ:</label>
                    <input type="time" id="heureDepart-ajout" name="heureDepart-ajout" required>
                    <label for="heureArrivee-ajout">Heure d'arrivée:</label>
                    <input type="time" id="heureArrivee-ajout" name="heureArrivee-ajout" required>
                    <label for="nombrePassagers-ajout">Nombre de passagers:</label>
                    <input type="number" id="nombrePassagers-ajout" name="nombrePassagers-ajout" required>
                    <div class="buttons">
                      <button type="submit" name="sauvegarderAjout" onclick="sauvegarderAjout()">Enregistrer</button>
                      <button type="button" class="cancel-btn" onclick="annuler()">Annuler</button>
                    </div>
                  </form>
                  </div>

                  <!-- FENETRE SUPPRIMER -->
                    <div class="modalSuppr" id="modalSuppr">
                      <h2>Supprimer le trajet</h2>
                      <form action="#" method="post">
                      <input  id="id_trajet_suppr" name="id_trajet_suppr" value="">
                        <p>Êtes-vous sûr de vouloir supprimer ce trajet ?</p>
                        <div class="buttons">
                            <button type="submit" name="confirmerSuppression" onclick="confirmerSuppression()">Confirmer</button>
                            <button type="button" class="cancel-btn" onclick="annuler()">Annuler</button>
                        </div>
                    </form>
                    </div>

               


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
                   
                    if (!depart.value || !arrivee.value || !typeTransport.value || !heureDepart.value || !heureArrivee.value || isNaN(nombrePassagers) || nombrePassagers < 0) {
                      alert("Veuillez remplir tous les champs correctement.");
                      return;
                    }

                    if (isNaN(nombrePassagers) || nombrePassagers < 0) {
                      alert("Le nombre de passagers doit être un entier positif.");
                      return;
                    }
                    if (heureArrivee <= heureDepart) {
                      alert("L'heure d'arrivée doit être supérieure à l'heure de départ.");
                      return;
                    }
                    document.getElementById('modalAjout').style.display = 'none';
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
                    document.getElementById('modalModif').style.display = 'none';
                    alert("Les modifications ont été enregistrées avec succès!");
                  }

                  function annuler() {
                    document.getElementById('modalModif').style.display = 'none';
                    document.getElementById('modalAjout').style.display = 'none';
                    document.getElementById('modalSuppr').style.display = 'none';
                  }
                  
                  function modifierTrajet(idTrajet) {
                    var trajet = {
                      depart: "Point de départ initial",
                      arrivee: "Point d'arrivée initial",
                      typeTransport: "Type de transport initial",
                      heureDepart: "Heure de départ initial",
                      heureArrivee: "Heure d'arrivée initial",
                      nombrePassagers: 3
                    };
                    document.getElementById('id_trajet').value = idTrajet;
                    // Remplacez les valeurs ci-dessus par celles que vous obtenez du trajet avec trajetId
                    afficherFenetreModale(trajet);
                  }

                  function supprimerTrajet(idTrajet) {
                    document.getElementById('modalSuppr').style.display = 'block';
                    console.log("ID du trajet selectionné -> " +idTrajet)
                    document.getElementById('id_trajet_suppr').value = idTrajet;  
                }

                </script>
                </div>
            </section>
           
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Ubanskyroute</span>
                </div>
              </div>
            </footer>
            <!-- End of Footer -->
          </div>
          <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
  </body>
</html> 


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['sauvegarderAjout'])) {
   
// Récupérer les données du formulaire
$wdepart = $_POST['depart-ajout'];
$warrivee = $_POST['arrivee-ajout'];
$heuredepart = $_POST['heureDepart-ajout'];
$heurearrivee = $_POST['heureArrivee-ajout'];
$nbpassager = $_POST['nombrePassagers-ajout'];


// Paramètres de connexion à la base de données
$servername = "localhost:3307";  
$username = "root"; 
$password = "";  
$dbname = "urbanskyroute";  

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configurer PDO pour afficher les erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL d'insertion
    $stmt = $conn->prepare("INSERT INTO trajet (heure_depart, heure_arrivee, wilaya_depart, wilaya_arrivee, nombre_passager) VALUES (:heuredepart, :heurearrivee, :wdepart, :warrivee, :nbpassager)");

    // Attribuer les valeurs aux paramètres de la requête
    $stmt->bindParam(':wdepart', $wdepart);
    $stmt->bindParam(':warrivee', $warrivee);
    $stmt->bindParam(':heuredepart', $heuredepart);
    $stmt->bindParam(':heurearrivee', $heurearrivee);
    $stmt->bindParam(':nbpassager', $nbpassager);
  
    

    // Exécuter la requête
    $stmt->execute();

    echo "Trajet enregistré avec succès !";
    
} catch(PDOException $e) {
    echo "Erreur lors de la publication du trajet : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
} 

elseif (isset($_POST['sauvegarderModification'])) {
    // Récupérer les données du formulaire de modification
    $id_trajet = $_POST['id_trajet']; 
    $wdepart = $_POST['depart-modifier'];
    $warrivee = $_POST['arrivee-modifier'];
    $heuredepart = $_POST['heureDepart-modifier'];
    $heurearrivee = $_POST['heureArrivee-modifier'];
    $nbpassager = $_POST['nombrePassagers-modifier'];

    // Paramètres de connexion à la base de données
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "urbanskyroute";

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configurer PDO pour afficher les erreurs SQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête SQL de modification
        $stmt = $conn->prepare("UPDATE trajet SET heure_depart = :heuredepart, heure_arrivee = :heure_arrivee, wilaya_depart = :wilaya_depart, wilaya_arrivee = :wilaya_arrivee, nombre_passager = :nombre_passager WHERE id_trajet = :id_trajet");

        // Attribuer les valeurs aux paramètres de la requête
        $stmt->bindParam(':id_trajet', $id_trajet);
        $stmt->bindParam(':wilaya_depart', $wdepart);
        $stmt->bindParam(':wilaya_arrivee', $warrivee);
        $stmt->bindParam(':heuredepart', $heuredepart);
        $stmt->bindParam(':heure_arrivee', $heurearrivee); 
        $stmt->bindParam(':nombre_passager', $nbpassager);

        // Exécuter la requête
        $stmt->execute();

        echo "Trajet modifié avec succès !";
    
    } catch (PDOException $e) {
        echo "Erreur lors de la modification du trajet : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $conn = null;
}

elseif (isset($_POST['confirmerSuppression'])) {
  // Récupérer l'ID du trajet à supprimer
  $id_trajet_supprimer = $_POST['id_trajet_suppr'];

  // Paramètres de connexion à la base de données
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "urbanskyroute";

  try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configurer PDO pour afficher les erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "ICI PHP";

    // Préparer la requête SQL de suppression
    $stmt = $conn->prepare("DELETE FROM trajet WHERE id_trajet = :id_trajet_supprimer");

    // Attribuer la valeur à paramètre de la requête
    $stmt->bindParam(':id_trajet_supprimer', $id_trajet_supprimer);

    // Exécuter la requête
    $stmt->execute();

    echo "Trajet supprimé avec succès !";

  } catch (PDOException $e) {
    echo "Erreur lors de la suppression du trajet : " . $e->getMessage();
  }

  // Fermer la connexion à la base de données
  $conn = null;
}

}
?>
