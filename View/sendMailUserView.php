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
            $return = "Problème lors de l'envoie du mail.";
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

$manager = new \Model\User\UserManager();
$user = $manager->getUserID($_GET['id']);

foreach ($user as $info) {
?>
    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main class="width_80">
        <h1 class="flexCenter title colorWhite"> Envoyer un E-mail </h1>
        <div id="contact" class="backgroundWhite flexCenter width_100">
            <form method="post" action="../assets/php/sendMailUser.php" class="flexColumn width_50">
                <label>À</label>
                <p class="backgroundGrey margin_15_0"><?=$info->getEmail() . "<span class='colorGrey'> (" .$info->getFirstname() . " " . $info->getLastname() . ") </span>" ?></p>
                <?php
                if (isset($_SESSION["id"])) { ?>
                    <label for="sender"> Votre adresse E-mail</label>
                    <input type="email" id="sender" name="sender" pattern=".*\S.*" value="<?=$_SESSION['email'] ?>" required>
                    <?php
                }
                else { ?>
                <label for="sender"> Votre adresse E-mail</label>
                <input type="email" id="sender" name="sender" pattern=".*\S.*" required>
                    <?php
                } ?>
                <label for="subject">Sujet</label>
                <input id="subject" type="text" name="subject" pattern=".*\S.*" required>
                <label for="message">Message</label>
                <textarea id="message" name="message"></textarea>
                <input type="hidden" name="recipient" value="<?=$info->getEmail() ?>">
                <input type="hidden" name="id" value="<?=$info->getId() ?>">
                <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Envoyer">
            </form>
        </div>
    </main>
<?php
}