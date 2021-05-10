<?php
if (isset($var['user'])) {

    echo "<pre>";
    print_r($var['user']);
    echo "</pre>";
?>
    <main>
        <div class="flexRow flexCenter" id="menuAccount">
            <a href="informationAccount.php" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
            <div class="separatorVertical"></div>
            <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
            <div class="separatorVertical"></div>
            <a href="favoritesAccount.php" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
            <div class="separatorVertical"></div>
            <a href="favoritesAccount.php" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
            <div class="separatorVertical"></div>
            <?php
            if ($_SESSION["role_fk"] === "1") { ?>
                <a href="#" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
                <div class="separatorVertical"></div>
            <?php
            } ?>
            <form method="post" action="../assets/php/disconnection.php">
                <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
            </form>
        </div>

        <div>
            <?php foreach ($var['user'] as $user1) {?>
            <p class="colorBlue"> <?= $user1->getId() ?></p>
        <?php }?>

            <h1 class="titleAccount">Mes informations personnelles</h1>
            <div class="containerAccount">
                <form action="#" method="post">
                    <label for="lastName" class="colorBlack size20">Nom <span class="size15 required colorBlue">*</span></label>
                    <input type="text" name="lastName" id="lastName" class="inputWhite colorBlue" value="<?=$user1->getLastname() ?>">
                    <label for="firstName" class="colorBlack size20">Prénom <span class="size15 colorBlue required">*</span></label>
                    <input type="text" name="fisrtName" id="firstName" class="inputWhite colorBlue" value="<?=$user1->getFirstname() ?>">
                    <label for="email" class="colorBlack size20">Email <span class="size15 colorBlue required">*</span></label>
                    <input type="text" name="email" id="email" class="inputWhite colorBlue" value="<?=$user1->getEmail() ?>">
                    <label for="phone" class="colorBlack size20">Téléphone <span class="size15 colorBlue required">*</span></label>
                    <input type="tel" name="phone" id="phone" class="inputWhite colorBlue" value="<?=$user1->getPhone() ?>">
                    <div class="flexCenter">
                        <input type="submit" class="buttonEnter colorWhite" value="Enregistrer">
                    </div>
                </form>
            </div>

            <h1 class="titleAccount">Changer mon Mot de passe</h1>
            <div class="containerAccount">
                <form action="#" method="post">
                    <label for="currentPassword" class="colorBlack size20">Mot de passe actuel <span class="size15 colorBlue required">*</span></label>
                    <input type="text" name="currentPassword" id="currentPassword" class="inputWhite colorBlue" value="mettre info">
                    <label for="newPassword" class="colorBlack size20">Nouveau mot de passe <span class="size15 colorBlue required">*</span></label>
                    <input type="text" name="newPassword" id="newPassword" class="inputWhite colorBlue" value="mettre info">
                    <div class="flexCenter">
                        <input type="submit" class="buttonEnter colorWhite" value="Changer">
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
}