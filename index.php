<?php
$title = "Anim'Nord : Acceuil";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

<main class=" width_100 flexColumn">
    <div class="backgroundPet flexCenter">
        <p class="question buttonWhite colorBlue">Vous avez perdus ou bien trouvés près de chez vous un chien ou un chat? Vous êtes tombés sur le bon site de chiens et de
            chats du Nord (59).</p>
    </div>
    <div id="#recentPost">
        <h2 class="center title2">Annonces récentes de chiens et de chats perdus</h2>
        <div class="width_80 flexRow flexCenter">
            <?php
            for ($i = 0; $i < 4; $i++) {
                echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                    <img class='imagePet' src='https://www.sciencesetavenir.fr/assets/img/2020/06/05/cover-r4x3w1000-5eda126862738-german-shepherd-3404340-1920.jpg'>
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Date de disparition</p>
                <p class='location'><i class='fas fa-search-location'></i>Lieu trouvé</p>
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
                    echo "
                <a href='#' class='containerRecentPost flexColumn flexCenter radius10'>
                    <img class='imagePet' src='https://www.sciencesetavenir.fr/assets/img/2020/06/05/cover-r4x3w1000-5eda126862738-german-shepherd-3404340-1920.jpg'>
                <p class='margin8'>Race de l'animal</p>
                <p class='margin8'>Date d'apparition</p>
                <p class='location'><i class='fas fa-search-location'></i>Lieu trouvé</p>
            </a>
                ";
                }
                ?>
        </div>
        <a href="pages/find.php" class="buttonEnter buttonCenter radius10 align">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>
        <div class="accountIndex">
            <h2 class="title3 center">Pas encore incrit ? ou bien pas encore connecté ?</h2>
        <div class="flexRow flexCenter">
            <a href="pages/registration.php" class="buttonWhite2">Inscription</a>
            <a href="pages/connect.php" class="buttonWhite2">Connexion</a>
        </div>

        </div>

    </div>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";

