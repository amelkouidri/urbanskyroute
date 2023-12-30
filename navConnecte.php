
<header>
<nav id="navbar" class="navbar">
        <ul>
        <li><a href="index2.php">Home</a></li>
        <li><a href="compagnie.php">Compagnie</a></li>
            <li><a href="profil.php">profil</a></li>
            <li><a href="RechercheTrajet.php">Recherche Trajets</a></li>
            <li><a href="#"  onclick="confirmLogout()">Déconnexion</a></li>

                    <script>
                    function confirmLogout() {
                    var confirmation = confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
                    if (confirmation) {
                    window.location.href = "index.php"; 
                    }
                    }
                    </script>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

</header>
