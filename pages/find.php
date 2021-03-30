<?php
$title = "Anim'Nord : Trouvés";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80 flexColumn">
        <h1 class="title colorWhite flexCenter"> Chiens et chats trouvés</h1>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/_partials/formCategories.php";
        ?>
        <div id="containerLostAd">
            <?php
            for ($i = 0; $i < 20; $i++) {
                echo "
                        <a href='#' class='post flexRow colorGrey'>
                        <div class='width_20'>
                        <img class='imagePet' src='https://www.sciencesetavenir.fr/assets/img/2020/06/05/cover-r4x3w1000-5eda126862738-german-shepherd-3404340-1920.jpg'>
                    </div>
                    <div class='flexColumn width80'>
                        <p class='titlePet'>Chien (mâle)</p>
                        <p class='postDate colorBlue'>Date du post</p>
                        <p>Trouvé le : <span class='colorBlue'>00/00/0000</span></p>
                        <p>Trouvé à : <span class='colorBlue'>ville</span></p>
                        <p>Race : <span class='colorBlue'> ....</span></p>
                        <p>Taille: <span class='colorBlue'>...</span></p>
                        <p>Poils: <span class='colorBlue'>....</span></p>
                        <p>Couleur du pelage : <span class='colorBlue'>........, ....</span></p>
                        <p>Robe : <span class='colorBlue'>....</span> </p>
                        <p>Description : <span class='colorBlue'>........................</span></p>
                    </div>
                </a>
                    ";
            }
            ?>
        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";

