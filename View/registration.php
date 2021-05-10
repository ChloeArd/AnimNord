<?php
session_start();
$title = "Anim'Nord : Compte";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_Partials/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_Partials/menu.php";

$return = "";
$id = "";

if (isset($_GET['error'])) {
    $id = "error";
    switch ($_GET['error']) {
        case '0':
            $return = "Email ou téléphone déjà utilisé !";
            break;
        case '1':
            $return = "Le mot de passe ne contient pas de majuscule / de chiffre / de minuscule / plus petit que 8 caractères !";
            break;
        case '2':
            $return = "L'email n'est pas valide !";
            break;
        case '3':
            $return = "Problème d'inscription !";
            break;
    }
}
?>

<div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Inscrivez-vous ! </h1>
    <div id="registration" class="backgroundWhite flexCenter width_100">
        <form method="post" id="formRegistration" action="../assets/php/registration.php" class="flexColumn width_50">
            <label class="size15 tooltip" data-text="Le nom est obligatoire" for="lastname"> Nom <span class="size15 colorBlue required">*</span></label>
            <input type="text" id="lastname" name="lastname" pattern=".*\S.*" required>
            <label class="size15 tooltip" data-text="Le prénom est obligatoire" for="firstname"> Prénom <span class="size15 colorBlue required">*</span></label>
            <input type="text" id="firstname" name="firstname" pattern=".*\S.*" required>
            <label class="size15 tooltip" data-text="L'adresse mail est obligatoire" for="email"> Adresse E-mail <span class="size15 colorBlue required">*</span></label>
            <input type="email" id="email" name="email" pattern=".*\S.*" required>
            <label class="size15 tooltip" data-text="Le téléphone est obligatoire et doit contenir minimum 9 chiffres et maximum 14 chiffres"  for="phone"> Téléphone <span class="size15 colorBlue required">*</span></label>
            <input type="tel" id="phone" name="phone" minlength="9" maxlength="14" pattern=".*\S.*" required>
            <label class="size15 tooltip" data-text="Le mot de passe est obligatoire et doit contenir au moins une majuscule, une minuscule, un chiffre, avoir minimum 10 caractères" for="password"> Mot de passe <span class="size15 colorBlue required">*</span></label>
            <input type="password" id="password" name="password" pattern=".*\S.*" required>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Créer mon compte">
            <a href="connect.php" class="buttonGrey">Déjà un compte ?</a>
        </form>
    </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/_Partials/footer.php";