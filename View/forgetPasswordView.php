<?php
$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "Aucun compte associé à cette E-mail";
            break;
        case '1':
            $return = "Adresse E-mail invalide !";
            break;
        case '2' :
            $return = "Veuillez entrer votre adresse E-mail !";
            break;
        case '3' :
            $return = "Le code de vérification est invalide !";
            break;
        case '4' :
            $return = "Veuillez entrer votre code de confirmation !";
            break;
        case '5' :
            $return = "Vos mots de passes ne correspondent pas !";
            break;
        case '6' :
            $return = "Votre nouveau mot de passe ne contient pas de majuscule / de chiffre / de minuscule / plus petit que 8 caractères !";
            break;
        case '7' :
            $return = "Veuillez remplir tous les champs !";
            break;
        case '8' :
            $return = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
            break;
    }
}
elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Un code de vérification vous a été envoyé par mail !";
            break;
        case '1':
            $return = "Le code de vérification est correct !";
            break;
    }
}
?>
<div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == "code") {
    ?>
        <main class="width_80">
            <h1 class="flexCenter title colorWhite"> Code de vérification pour le mot de passe oublié </h1>
            <a href="../index.php?controller=connection" class="colorBlue underline link margin_0_20">< Retour à la connexion </a>
            <div id="connect" class="backgroundWhite flexCenter width_100">
                <form method="post" action="../assets/php/forgetPassword.php" class="flexColumn width_50">
                    <label for="code"> Code de vérification </label>
                    <input type="text" id="code" name="code" pattern=".*\S.*" required>
                    <input type="submit" name="submitCode" class="buttonEnter colorWhite radius10 pointer" value="Entrer">
                </form>
            </div>
        </main>
    <?php
    }
    else { ?>
        <main class="width_80">
            <h1 class="flexCenter title colorWhite"> Nouveau mot de passe </h1>
            <a href="../index.php?controller=connection" class="colorBlue underline link margin_0_20">< Retour à la connexion </a>
            <div id="connect" class="backgroundWhite flexCenter width_100">
                <form method="post" action="../assets/php/forgetPassword.php" class="flexColumn width_50">
                    <label for="password"> Nouveau mot de passe</label>
                    <input type="password" id="password" name="password" pattern=".*\S.*" required>
                    <label for="repeatPassword"> Confirmation du nouveau mot de passe </label>
                    <input type="password" id="repeatPassword" name="repeatPassword" pattern=".*\S.*" required>
                    <input type="submit" name="submitPass" class="buttonEnter colorWhite radius10 pointer" value="Entrer">
                </form>
            </div>
        </main>
        <?php
    }
}
else { ?>
    <main class="width_80">
        <h1 class="flexCenter title colorWhite"> Mot de passe oublié  </h1>
        <a href="../index.php?controller=connection" class="colorBlue underline link margin_0_20">< Retour à la connexion </a>
        <div id="connect" class="backgroundWhite flexCenter width_100">
            <form method="post" action="../assets/php/forgetPassword.php" class="flexColumn width_50">
                <label for="email"> Adresse E-mail </label>
                <input type="email" id="email" name="email" pattern=".*\S.*" required>
                <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Entrer">
            </form>
        </div>
    </main>
    <?php
}