<?php
$return = "";
$id = "";

if (isset($_GET['error'])) {
    $id = "error";
    switch ($_GET['error']) {
        case '0':
            $return = "Vous devez vous déconnecter puis vous reconnecter pour changer de mot de passe !";
            break;
    }
}
?>

<div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
<main>
    <div>
        <h1 class="titleAccount">Changer mon Mot de passe</h1>
        <div class="containerAccount">
            <form action="" method="post">
                <label for="currentPassword" class="colorBlack size20">Mot de passe actuel <span class="size15 colorBlue required">*</span></label>
                <input type="password" name="currentPassword" id="currentPassword" class="inputWhite colorBlue" required>
                <label for="newPassword" class="colorBlack size20">Nouveau mot de passe <span class="size15 colorBlue required">*</span></label>
                <input type="password" name="newPassword" id="newPassword" class="inputWhite colorBlue" required>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="flexCenter">
                    <input type="submit" class="buttonEnter colorWhite" value="Changer">
                </div>
            </form>
        </div>
    </div>
</main>