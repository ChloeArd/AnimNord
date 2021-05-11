<main>
    <div class="flexRow flexCenter" id="menuAccount">
        <a href="../../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
        <div class="separatorVertical"></div>
        <a href="../../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
        <div class="separatorVertical"></div>
        <a href="../favoritesAccount.php" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
        <div class="separatorVertical"></div>
        <a href="../favoritesAccount.php" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
        <div class="separatorVertical"></div>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="#" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
            <div class="separatorVertical"></div>
            <?php
        } ?>
        <form method="post" action="../../assets/php/disconnection.php">
            <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
        </form>
    </div>

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