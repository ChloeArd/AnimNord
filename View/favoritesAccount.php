<?php
session_start();
$title = "Anim'Nord : Informations";
require_once $_SERVER['DOCUMENT_ROOT'] . "/_Partials/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "./_Partials/menu.php"
?>

    <main>
        <div class="flexRow flexCenter" id="menuAccount">
            <a href="informationAccount.php" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
            <div class="separatorVertical"></div>
            <a href="adAccountView.php" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
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
            <h1 class="titleAccount">Mes favoris de chiens et chats perdus</h1>
            <div id="containerLostAd" class="marginAuto container2">
                <a class="colorBlack" href=""><i class="fas fa-star"></i></a>
                <a href='#' class='post flexRow flexCenter colorGrey'>
                    <div class='width_30'>
                        <img class='imagePet' src='https://placedog.net/200/250?id=1' >
                    </div>
                    <div class='flexColumn width_70 postAnimals'>
                        <p class='titlePet'>Chien (mâle)</p>
                        <p class='postDate colorBlue'>Date du post</p>
                        <p>Perdu le : <span class='colorBlue'>00/00/0000</span></p>
                        <p>Perdu à : <span class='colorBlue'>ville</span></p>
                        <p>Race : <span class='colorBlue'> ....</span></p>
                        <p>Taille: <span class='colorBlue'>...</span></p>
                        <p>Poils: <span class='colorBlue'>....</span></p>
                        <p>Couleur du pelage : <span class='colorBlue'>........, ....</span></p>
                        <p>Robe : <span class='colorBlue'>....</span> </p>
                        <p>Description : <span class='colorBlue'>........................</span></p>
                    </div>
                </a>
            </div>
            <h1 class="titleAccount">Mes favoris de chiens et chats perdus</h1>
            <p class="colorWhite margin_15_0 center categoriesAnimal">Tu n'as pas encore ajouté d'annonce dans tes favoris !</p>
        </div>
    </main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/_Partials/footer.php";