<?php
session_start();
$title = "Anim'Nord : Mot de passe oublié";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
?>

<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Mot de passe oublié  </h1>
    <a href="connect.php" class="colorBlue underline link margin_0_20">< Retour à la connexion </a>
    <div id="connect" class="backgroundWhite flexCenter width_100">
        <form method="post" action="#" class="flexColumn width_50">
            <label for="mail"> Adresse E-mail </label>
            <input type="email" id="mail" name="mail" required>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Entrer">
        </form>
    </div>
</main>
