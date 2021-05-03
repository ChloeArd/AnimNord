<?php
$title = "Anim'Nord : Adopter";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/menu.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
else {
    $page = 1;
}
?>

    <main class="width_80 flexColumn">
        <h1 class="title colorWhite flexCenter"> Chiens et chats à adopter</h1>
        <div class="flexRow">
            <?php
            $true = false;
            include $_SERVER['DOCUMENT_ROOT'] . "/_partials/formCategories.php";
            ?>
            <div id="containerLostAd">
                <?php
                // The page limit is 30 pet.
                $first = ($page - 1) * 30;
                $last = ($page * 30) - 1;
                $count = 35;
                if ($last > $count) {
                    $last = $count;
                }
                for ($i = $first; $i < $last; $i++) {
                    $id = $i + 6;
                    echo "
                        <a class='colorBlack' href='#'><i class='far fa-star star'></i></a>
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
                    ";
                }

                if ($count > 29) {
                    if ($page < 2) {
                        $prev = 1;
                    }
                    else {
                        $prev = $page - 1;
                    }
                    $max = ($count / 2);
                    if ($page > ($max - 1)) {
                        $next = $max;
                    }
                    else {
                        $next = $page + 1;
                    }
                    echo "<div class='flexCenter flexRow'>
                             <a class='underline colorBlue linkPage' href='./find.php?page=$prev'><i class='fas fa-arrow-alt-circle-left'></i>Page précédente</a>
                             <a class='underline colorBlue linkPage' href='./find.php?page=$next'>Page suivante<i class='fas fa-arrow-alt-circle-right'></i></a>
                          </div>";
                }
                ?>
            </div>
        </div>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";

