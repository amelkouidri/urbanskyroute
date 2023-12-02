<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - UrbanSky Routes</title>
    <link rel="stylesheet" href="assets/css/style1.css"> 
    <link rel="stylesheet" href="assets/css/style.css"> 
    <script>
        function validateSignInForm() {
            var signInEmail = document.getElementById("sign-in-email").value;
            var signInPassword = document.getElementById("sign-in-pass").value;

            // Vérification du format de l'e-mail en utilisant une expression régulière
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(signInEmail)) {
                alert("L'adresse e-mail n'est pas valide.");
                return false;
            }

            // Vérification de la longueur du mot de passe
            if (signInPassword.length < 6) {
                alert("Le mot de passe doit contenir au moins 6 caractères.");
                return false;
            }

             var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/;
        if (!passwordRegex.test(signInPassword)) {
            alert("Le mot de passe doit contenir au moins une majuscule, un chiffre et un caractère spécial.");
            return false;
        }

            // Autres vérifications si nécessaires...

            // Si tout est valide, le formulaire peut être soumis
            return true;
        }

        function validateSignUpForm() {
            var signUpUsername = document.getElementById("sign-up-user").value;
            var signUpPassword = document.getElementById("sign-up-pass").value;
            var signUpRepeatPassword = document.getElementById("sign-up-repeat-pass").value;
            var signUpEmail = document.getElementById("sign-up-email").value;

            // Vérification du format de l'e-mail en utilisant une expression régulière
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(signUpEmail)) {
                alert("L'adresse e-mail n'est pas valide.");
                return false;
            }

            // Vérification de la longueur du mot de passe
            if (signUpPassword.length < 6) {
                alert("Le mot de passe doit contenir au moins 6 caractères.");
                return false;
            }

            var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&()+])[A-Za-z\d!@#$%^&*()+]+$/;
                if (!passwordRegex.test(signUpPassword)) {
                alert("Le mot de passe doit contenir au moins une majuscule, un chiffre et un caractère spécial.");
            return false;
            }

            // Vérification que les mots de passe correspondent
            if (signUpPassword !== signUpRepeatPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            // Autres vérifications si nécessaires...

            // Si tout est valide, le formulaire peut être soumis
            return true;
        }
    </script>
</head>
<body>
     <?php
      include('navNonconnecte.php');
      //<!-- .navbar -->
      ?>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form method="POST" action="" onsubmit="return validateSignInForm()">
                        <div class="group">
                            <label for="sign-in-email" class="label">Email Address</label>
                            <input id="sign-in-email" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="sign-in-pass" class="label">Password</label>
                            <input id="sign-in-pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form method="POST" action="" onsubmit="return validateSignUpForm()">
                        <div class="group">
                            <label for="sign-up-user" class="label">Username</label>
                            <input id="sign-up-user" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="sign-up-pass" class="label">Password</label>
                            <input id="sign-up-pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="sign-up-repeat-pass" class="label">Repeat Password</label>
                            <input id="sign-up-repeat-pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="sign-up-email" class="label">Email Address</label>
                            <input id="sign-up-email" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already a Member?</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
