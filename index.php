<?php
$title = "Anim'Nord : Acceuil";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

<main class=" width_100 flexColumn">
    <div class="backgroundPet flexCenter">
        <p class="question buttonWhite colorBlue">Vous avez perdus, trouvés ou vous voulez adopter près de chez vous ? Vous êtes tombés sur le bon site de chiens et de
            chats du Nord (59).</p>
    </div>
    <div id="#recentPost">
        <h2 class="center title2">Annonces récentes de chiens et de chats perdus</h2>
        <div class="width_80 flexRow flexCenter">
            <?php
            for ($i = 0; $i < 4; $i++) {
                $id = $i + 10;
                echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Date de disparition</p>
                <p class='location'><i class='fas fa-search-location'></i>Lieu perdu</p>
            </a>
                ";
            }
            ?>
        </div>
        <a href="pages/lost.php" class="buttonEnter buttonCenter radius10 align">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>

        <div class="separatorHorizontal"></div>
            <h2 class="center title2">Annonces récentes de chiens et de chats trouvés</h2>
            <div class="width_80 flexRow flexCenter">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $id = $i + 1;
                    echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Date d'apparition</p>
                <p class='location'><i class='fas fa-search-location'></i>Lieu trouvé</p>
            </a>
                ";
                }
                ?>
        </div>
        <div class="separatorHorizontal"></div>
        <h2 class="center title2">Annonces récentes de chiens et de chats à adopter</h2>
        <div class="width_80 flexRow flexCenter">
            <?php
            for ($i = 0; $i < 4; $i++) {
                $id = $i + 6;
                echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Âge</p>
                <p class='location'><i class='fas fa-map-marker-alt'></i>Lieu</p>
            </a>
                ";
            }
            ?>
        </div>
        <a href="pages/adopt.php" class="buttonEnter buttonCenter radius10 align">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>
        <div class="accountIndex">
            <h2 class="title3 center">Pas encore incrit ? ou pas encore connecté ?</h2>
        <div class="flexRow flexCenter">
            <a href="pages/registration.php" class="buttonWhite2">Inscription</a>
            <a href="pages/connect.php" class="buttonWhite2">Connexion</a>
        </div>

        </div>

    </div>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";

