<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - UrbanSky Routes</title>
    <link rel="stylesheet" href="style1.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    
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
function handleAjaxResponse(data, username) {



    if (data === "Inscription réussie" || data === "Connexion réussie") {
        vérifierRole(username);
    } else {
        alert(data);
    }
}

function sendAjaxRequest(url, data, successCallback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                successCallback(xhr.responseText);
            } else {
                alert("Erreur lors de la requête Ajax");
            }
        }
    };

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}

function vérifierRole(username) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var roleData = xhr.responseText;
                if (roleData === "user") {
                    window.location.href = "index-2.php";
                } else if (roleData === "admin") {
                    window.location.href = "index3.php";
                } else {
                    alert("Rôle non reconnu");
                }
            } else {
                alert("Erreur lors de la requête Ajax pour vérifier le rôle");
            }
        }
    };

    xhr.open("POST", "verifier_role.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("user=" + encodeURIComponent(username));
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".login-btn").addEventListener("click", function () {
        var username = document.getElementById("user").value;
        var password = document.getElementById("pass").value;

        if (username.trim() === "" || password.trim() === "") {
            document.getElementById("user").style.border = "2px solid red";
            document.getElementById("pass").style.border = "2px solid red";
            alert("Veuillez remplir tous les champs.");
            return;
        }

        var data = "user=" + encodeURIComponent(username) + "&pass=" + encodeURIComponent(password);

        sendAjaxRequest("Connexion.php", data, function(data) {
            handleAjaxResponse(data, username);
        });
    });

    document.querySelector(".signup-btn").addEventListener("click", function () {
        var username = document.getElementById("user-signup").value;
        var password = document.getElementById("pass-signup").value;
        var repeatPassword = document.getElementById("pass-repeat").value;
        var email = document.getElementById("email").value;
        var usernameRegex = /^[a-zA-Z0-9_-]{3,16}$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (username.trim() === "" || password.trim() === "" || repeatPassword.trim() === "" || email.trim() === "") {
            document.getElementById("user-signup").style.border = "2px solid red";
            document.getElementById("pass-signup").style.border = "2px solid red";
            document.getElementById("pass-repeat").style.border = "2px solid red";
            document.getElementById("email").style.border = "2px solid red";
            alert("Veuillez remplir tous les champs.");
            return;
        }

        if (password !== repeatPassword) {
            document.getElementById("pass-signup").style.border = "2px solid red";
            document.getElementById("pass-repeat").style.border = "2px solid red";
            alert("Les mots de passe ne correspondent pas.");
            return;
        }

        if (!usernameRegex.test(username)) {
            document.getElementById("user-signup").style.border = "2px solid red";
            alert("Le nom d'utilisateur doit être alphanumérique, avec des underscores ou des tirets, et avoir une longueur de 3 à 16 caractères.");
            return;
        }

        if (!emailRegex.test(email)) {
            document.getElementById("email").style.border = "2px solid red";
            alert("Veuillez entrer une adresse e-mail valide.");
            return;
        }

        var data = "user=" + encodeURIComponent(username) + "&pass=" + encodeURIComponent(password) + "&email=" + encodeURIComponent(email);

        sendAjaxRequest("inscription.php", data, function(data) {
            handleAjaxResponse(data, username);
        });
    });

    document.getElementById("pass-signup").addEventListener("input", function () {
        var password = this.value;
        var result = zxcvbn(password);

        switch (result.score) {
            case 0:
            case 1:
                document.getElementById("password-strength").textContent = "Faible";
                break;
            case 2:
                document.getElementById("password-strength").textContent = "Moyen";
                break;
            case 3:
            case 4:
                document.getElementById("password-strength").textContent = "Fort";
                break;
            default:
                document.getElementById("password-strength").textContent = "";
        }
    });

    var inputElements = document.querySelectorAll("#user, #pass, #user-signup, #pass-signup, #pass-repeat, #email");
    inputElements.forEach(function (element) {
        element.addEventListener("input", function () {
            this.style.border = "1px solid #ccc";
        });
    });
});
</script>

</body>
</html>
