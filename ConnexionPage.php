<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - UrbanSky Routes</title>
    <link rel="stylesheet" href="style1.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="script.js"></script>
	<style>
	body {
    background: url('Capture3.PNG') no-repeat center;
    background-size: cover; /* Pour couvrir toute la surface */
}
</style>
</head>
<body >
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input">
                        <div id="result"></div>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="button" class="button login-btn" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user-signup" class="label">Username</label>
                        <input id="user-signup" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass-signup" class="label">Password</label>
                        <input id="pass-signup" type="password" class="input" data-type="password">
                        <div id="password-strength" style="margin-top: 5px;"></div>
                    </div>
                    <div class="group">
                        <label for="pass-repeat" class="label">Repeat Password</label>
                        <input id="pass-repeat" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email Address</label>
                        <input id="email" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="button" class="button signup-btn" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already a Member?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script jQuery -->
<script>
    $(document).ready(function () {
        $(".login-btn").click(function () {
            var username = $("#user").val();
            var password = $("#pass").val();

            if (username.trim() === "") {
                $("#user").css("border", "2px solid red");
                alert("Veuillez remplir tous les champs.");
                return;
            }

            if (password.trim() === "") {
                $("#pass").css("border", "2px solid red");
                alert("Veuillez remplir tous les champs.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "connexion.php",
                data: { user: username, pass: password },
                success: function (data) {
                    console.log(data);
                    $("#user, #pass").css("border", "1px solid #ccc");

                    if (data === "Connexion réussie") {
                        // Vérification du rôle ici
                        vérifierRole(username);
                    } else {
                        alert("Nom d'utilisateur ou mot de passe incorrect.");
                    }
                },
                error: function () {
                    alert("Erreur lors de la requête Ajax");
                }
            });
        });

        $(".signup-btn").click(function () {
            var username = $("#user-signup").val();
            var password = $("#pass-signup").val();
            var repeatPassword = $("#pass-repeat").val();
            var email = $("#email").val();
            var usernameRegex = /^[a-zA-Z0-9_-]{3,16}$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (username.trim() === "" || password.trim() === "" || repeatPassword.trim() === "" || email.trim() === "") {
                $("#user-signup, #pass-signup, #pass-repeat, #email").css("border", "2px solid red");
                alert("Veuillez remplir tous les champs.");
                return;
            }

            if (password !== repeatPassword) {
                $("#pass-signup, #pass-repeat").css("border", "2px solid red");
                alert("Les mots de passe ne correspondent pas.");
                return;
            }

            if (!usernameRegex.test(username)) {
                $("#user-signup").css("border", "2px solid red");
                alert("Le nom d'utilisateur doit être alphanumérique, avec des underscores ou des tirets, et avoir une longueur de 3 à 16 caractères.");
                return;
            }

            if (!emailRegex.test(email)) {
                $("#email").css("border", "2px solid red");
                alert("Veuillez entrer une adresse e-mail valide.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "inscription.php",
                data: { user: username, pass: password, email: email },
                success: function (data) {
                    $("#user-signup, #pass-signup, #pass-repeat, #email").css("border", "1px solid #ccc");

                    if (data === "Inscription réussie") {
                        // Vérification du rôle ici
                        vérifierRole(username);
                    } else {
                        alert(data);
                    }
                },
                error: function () {
                    alert("Erreur lors de la requête Ajax");
                }
            });
        });

        function vérifierRole(username) {
            $.ajax({
                type: "POST",
                url: "verifier_role.php",
                data: { user: username },
                success: function (roleData) {
                    if (roleData === "user") {
                        window.location.href = "index-2.php";
                    } else if (roleData === "admin") {
                        window.location.href = "index3.php";
                    } else {
                        alert("Rôle non reconnu");
                    }
                },
                error: function () {
                    alert("Erreur lors de la requête Ajax pour vérifier le rôle");
                }
            });
        }

        $("#pass-signup").on("input", function () {
            var password = $(this).val();
            var result = zxcvbn(password);

            switch (result.score) {
                case 0:
                case 1:
                    $("#password-strength").text("Faible");
                    break;
                case 2:
                    $("#password-strength").text("Moyen");
                    break;
                case 3:
                case 4:
                    $("#password-strength").text("Fort");
                    break;
                default:
                    $("#password-strength").text("");
            }
        });

        $("#user, #pass, #user-signup, #pass-signup, #pass-repeat, #email").on("input", function () {
            $(this).css("border", "1px solid #ccc");
        });
    });
</script>
</body>
</html>
