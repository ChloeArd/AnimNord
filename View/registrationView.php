<?php
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
        case '4':
            $return = "Les mots de passe ne correspondent pas !";
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
            <label class="size15 tooltip" data-text="Le mot de passe est obligatoire et doit contenir au moins une majuscule, une minuscule, un chiffre, avoir minimum 10 caractères" for="password2"> Mot de passe <span class="size15 colorBlue required">*</span></label>
            <input type="password" id="password2" name="password2" pattern=".*\S.*" required>
            <p id="law" class="colorGrey">Loi RGPD <i class="fas fa-caret-down"></i></p>
            <p id="infoLaw" class="colorGrey size12">
                Depuis la loi n° 78-17 du 6 janvier 1978, toutes les informations recueillies sur ce formulaire, vous seront accessible, vous pourrez les rectifier, demander leur effacement en supprimant votre compte ou exercer votre droit à la limitation du traitement de vos données.
                Lorsque vous posterez une annonce, vos informations seront diffusées et vue par tous les utilisateurs accédant à l'annonce. Elles seront mises en œuvre pour pouvoir vous contacter à propos de l'annonce poster, de connaître l'identité
                de la personne qui commente une annonce. Ces informations sont les suivantes : Prénom, nom, E-mail, téléphone.
            </p>
            <input type="submit" class="buttonEnter colorWhite radius10 pointer" value="Créer mon compte">
            <a href="../index.php?controller=registration" class="buttonGrey">Déjà un compte ?</a>
        </form>
    </div>
</main>