<?php
session_start();
$title = "Anim'Nord : Contact";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Contactez-nous !  </h1>
    <div id="contact" class="backgroundWhite flexCenter width_100">
        <form method="post" action="../assets/php/sendMail.php" class="flexColumn width_50">
            <label for="mail"> Adresse E-mail</label>
            <input type="email" id="mail" name="mail" required>
            <label for="subject">Sujet</label>
            <input id="subject" type="text" name="subject" required>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Envoyer">
        </form>
    </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";