<?php
if (isset($var['user'])) {
?>
    <main>
        <div class="flexRow flexCenter" id="menuAccount">
            <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
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
            <h1 class="titleAccount">Mes informations personnelles</h1>
            <div class="containerAccount table">
                <p  class="colorBlack size20">Nom : <span class="colorBlue"><?=$user1->getLastname() ?></span></p>
                <p  class="colorBlack size20">Prénom : <span class="colorBlue"><?=$user1->getFirstname() ?></span></p>
                <p  class="colorBlack size20">Email : <span class="colorBlue"><?=$user1->getEmail() ?></span></p>
                <p  class="colorBlack size20">Téléphone : <span class="colorBlue"><?=$user1->getPhone() ?></span></p>
                <div class="flexCenter">
                    <a href="../index.php?controller=user&action=update&id=<?=$user1->getId() ?>" class="buttonEnter center colorWhite">Modifier <i class="far fa-edit"></i></a>
                </div>
            </div>
            <?php }?>

            <div class="flexCenter">
                <a href="../index.php?controller=user&action=updatePass&id=<?=$_GET['id'] ?>" class="buttonGrey">Changer mon mot de passe <i class="far fa-edit"></i></a>
            </div>
        </div>
    </main>
<?php
}