<?php
$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "L'email n'est pas valide !";
            break;
        case '1':
            $return = "Tous les champs ne sont pas rempli.";
            break;
    }
}
elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Votre E-mail a bien été envoyé !";
            break;
    }
}
?>
<div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Contactez-nous !  </h1>
    <div id="contact" class="backgroundWhite flexCenter width_100">
        <form method="post" action="../assets/php/sendMail.php" class="flexColumn width_50">
            <label for="mail"> Adresse E-mail</label>
            <?php
            if (isset($_SESSION['email'])) { ?>
                <input type="email" id="mail" name="mail" pattern=".*\S.*" value="<?=$_SESSION['email'] ?>" required>
                <?php
            }
            else { ?>
                <input type="email" id="mail" name="mail" pattern=".*\S.*" required>
            <?php
            } ?>
            <label for="subject">Sujet</label>
            <input id="subject" type="text" name="subject" pattern=".*\S.*" required>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Envoyer">
        </form>
    </div>
</main>