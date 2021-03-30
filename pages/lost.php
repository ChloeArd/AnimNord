<?php
$title = "Anim'Nord : Perdus";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";
?>

    <main class="width_80 flexColumn">
        <h1 class="title colorWhite flexCenter"> Chiens et chats perdus</h1>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/_partials/formCategories.php";
        ?>
            <div id="containerLostAd">
                <?php
                for ($i = 0; $i < 20; $i++) {
                    $id = $i + 10;
                    echo "
                        <a href='#' class='post flexRow colorGrey'>
                        <div class='width_20'>
                        <img class='imagePet' src='https://placedog.net/500/280?id=". $id ."' >
                    </div>
                    <div class='flexColumn width80'>
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
                    ";
                }
                ?>
            </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";

