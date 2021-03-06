<?php
$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vos informations personnelles ont bien été modifié !";
            break;
        case '1':
            $return = "Votre mot de passe a bien été changé !";
            break;
    }
}

if (isset($var['user'])) {
    if ($_GET['id'] === $_SESSION['id']) { ?>
        <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
        <main>
            <div id="buttonAccount" class="buttonEnter colorWhite flexCenter">Mon compte <i class="fas fa-caret-down"></i></div>

            <div class="flexColumn marginAuto width_70" id="menuAccountMobile">
                <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes informations</a>
                <a href="../index.php?controller=adlost&action=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes annonces</a>
                <a href="../index.php?controller=adlost&favorite=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes favoris</a>
                <?php
                if ($_SESSION["role_fk"] === "1") { ?>
                    <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorOrange"></i>Gestion des utilisateurs</a>
                    <?php
                } ?>
                <form method="post" action="../assets/php/disconnection.php">
                    <span class="margin_0_20 linkAccount"><i class="fas fa-sign-out-alt colorRed"></i><input type="submit" class="disconnection buttonRed" value="Me déconnecter"></span>
                </form>
            </div>

            <div class="flexRow flexCenter" id="menuAccount">
                <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
                <div class="separatorVertical"></div>
                <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
                <div class="separatorVertical"></div>
                <a href="../index.php?controller=adlost&favorite=view&delete=ad" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
                <div class="separatorVertical"></div>
                <?php
                if ($_SESSION["role_fk"] === "1") { ?>
                    <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
                    <div class="separatorVertical"></div>
                    <?php
                } ?>
                <form method="post" action="../assets/php/disconnection.php">
                    <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
                </form>
            </div>

            <div>
                <?php
                foreach ($var['user'] as $user1) {?>
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
                    <?php
                }?>

                <div class="flexCenter">
                    <a href="../index.php?controller=user&action=updatePass&id=<?=$_GET['id'] ?>" class="buttonGrey">Changer mon mot de passe <i class="far fa-edit"></i></a>
                </div>

                <div class="flexCenter">
                    <a href="../index.php?controller=user&action=delete&id=<?=$_GET['id'] ?>" class="buttonRed2 radius10 colorWhite">Supprimer mon compte</a>
                </div>
            </div>
        </main>
<?php
    }
}