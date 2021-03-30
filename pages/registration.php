<?php
$title = "Anim'Nord : Compte";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Inscrivez-vous ! </h1>
    <div id="registration" class="backgroundWhite flexCenter width_100">
        <form method="post" action="#" class="flexColumn width_50">
            <label class="size15" for="lastname"> Nom </label>
            <input type="text" id="lastname" name="lastname" required>
            <label class="size15" for="firstname"> Prénom </label>
            <input type="text" id="firstname" name="firstname" required>
            <label class="size15" for="mail"> Adresse E-mail </label>
            <input type="email" id="mail" name="mail" required>
            <label class="size15" for="tel"> Téléphone </label>
            <input type="tel" id="tel" name="tel" required>
            <label class="size15" for="city"> Ville</label>
            <input type="text" id="city" name="city" required>
            <label class="size15" for="password"> Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <label class="size15" for="repeatPassword">Repet du mot de passe</label>
            <input type="password" id="repeatPassword" name="repeatePassword" required>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Créer mon compte">
            <a href="connect.php" class="buttonGrey">Déjà un compte ?</a>
        </form>
    </div>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";