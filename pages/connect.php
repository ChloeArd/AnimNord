<?php
$title = "Anim'Nord : Compte";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80">
        <h1 class="flexCenter title colorWhite"> Connexion  </h1>
        <div id="connect" class="backgroundWhite flexCenter width_100">
            <form method="post" action="#" class="flexColumn width_50">
                <label for="mail"> Adresse E-mail </label>
                <input type="email" id="mail" name="mail" required
                <label for="password"> Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <a href="#" class="colorBlue underline link">Mot de passe oublié ?</a>
                <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Connexion">
                <a href="registration.php" class="buttonGrey">Pas encore inscrit ?</a>
            </form>
        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";