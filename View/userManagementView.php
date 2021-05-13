<?php
$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Le rôle a bien été modifié !";
            break;
    }
}

if (isset($var['users'])) { ?>
    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
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
                <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
                <div class="separatorVertical"></div>
                <?php
            } ?>
            <form method="post" action="../assets/php/disconnection.php">
                <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
            </form>
        </div>

        <div>
            <form class="flexRow width_80 flexCenter">
                <input class="margin_0_20" type="text" name="firstname" placeholder="Prénom">
                <input class="margin_0_20" type="text" name="lastname" placeholder="Nom">
                <select class="margin_0_20">
                    <option value="2">Utilisateur</option>
                    <option value="3">Modérateur</option>
                    <option value="1">Administrateur</option>
                </select>
                <input type="submit" class="buttonGreen colorWhite" value="Chercher">
            </form>

            <h1 class="titleAccount">Tous les utilisateurs</h1>
            <?php
            foreach ($var['users'] as $users) {?>
                <div class="containerAccount table">
                    <p class="colorBlack size20">Nom : <span class="colorBlue"><?=$users->getLastname() ?></span>
                        <a href="../index.php?controller=user&action=delete&id=<?=$users->getId() ?>" class="colorBlack"><i class="far fa-trash-alt"></i></a>
                    </p>
                    <p class="colorBlack size20">Prénom : <span class="colorBlue"><?=$users->getFirstname() ?></span></p>
                    <p class="colorBlack size20">Email : <span class="colorBlue"><?=$users->getEmail() ?></span></p>
                    <p class="colorBlack size20">Téléphone : <span class="colorBlue"><?=$users->getPhone() ?></span></p>
                    <p class="colorBlack size20">Role : <span class="colorBlue"><?=$users->getRoleFk()->getRole() ?></span>
                        <a href="../index.php?controller=user&action=updateRole&id=<?=$users->getId() ?>" class="colorBlack"><i class="far fa-edit"></i></a>
                    </p>
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
