<?php

$title = "Anim'Nord : Informations";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "./_partials/menu.php"
?>

    <main>
        <div class="flexRow flexCenter" id="menuAccount">
            <a href="informationAccount.php" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
            <div class="separatorVertical"></div>
            <a href="adAccount.php" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
            <div class="separatorVertical"></div>
            <a href="favoritesAccount.php" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
            <div class="separatorVertical"></div>
            <a href="#" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
            <div class="separatorVertical"></div>
            <a href="#" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
            <div class="separatorVertical"></div>
            <form>
                <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
            </form>
        </div>

        <div>
            <h1 class="titleAccount">Mes annonces</h1>
            <div id="containerLostAd" class="marginAuto">
                <a class="colorBlack" href=""><i class="far fa-edit"></i></a>
                <a class="colorBlack" href=""><i class="far fa-trash-alt"></i></a>
                <a href='#' class='post flexRow flexCenter colorGrey'>
                    <div class='width_30'>
                        <img class='imagePet' src='https://placedog.net/200/250?id=". $id ."' >
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
        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";