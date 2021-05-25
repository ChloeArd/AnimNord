<?php
$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "Aucun compte associé à cette email";
            break;
        case '1':
            $return = "Problème de connexion.";
            break;
        case '2' :
            $return = "Le mot de passe est incorrect !";
            break;
    }
}
elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien inscrit(e) !";
            break;
    }
}
?>

<div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
<main class="width_80">
    <h1 class="flexCenter title colorWhite"> Connexion </h1>
    <div id="connect" class="backgroundWhite flexCenter width_100">
        <form method="post" id="formConnect" action="/assets/php/connection.php" class="flexColumn width_50">
            <label for="email"> Adresse E-mail <span class="size15 colorBlue required">*</span></label>
            <input type="email" id="email" name="email" pattern=".*\S.*" required>
            <label for="password"> Mot de passe <span class="size15 colorBlue required">*</span></label>
            <input type="password" id="password" name="password" pattern=".*\S.*" required>
            <a href="../index.php?controller=forgetPassword" class="colorBlue underline link">Mot de passe oublié ?</a>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Connexion">
            <a href="registration.php" class="buttonGrey">Pas encore inscrit ?</a>
        </form>
    </div>
</main>