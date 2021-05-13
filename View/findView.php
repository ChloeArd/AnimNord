<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
else {
    $page = 1;
}

if (isset($var['ads'])) {?>

    <main class="width_80 flexColumn">
        <h1 class="title colorWhite flexCenter"> Chiens et chats trouvés</h1>
        <div class="flexRow">
            <?php
            $situation = "Trouvé le :";
            $true = true;
            include $_SERVER['DOCUMENT_ROOT'] . "/_Partials/formCategories.php"; ?>
            <div id="containerLostAd">
                <?php
                // The page limit is 30 pet.
                $first = ($page - 1) * 30;
                $last = ($page * 30) - 1;
                $count = count($var['ads']);
                if ($last > $count) {
                    $last = $count;
                }
                foreach ($var['ads'] as $ad) {
                    $dateFind = new DateTime($ad->getDateFind());
                    $date = new DateTime($ad->getDate()); ?>
                    <a href='../index.php?controller=adfind&action=adComment&id=<?=$ad->getId()?>' class='post flexRow flexCenter colorGrey'>
                        <div class='width_30'>
                            <?php
                            if ($ad->getPicture() === null || $ad->getPicture() === "") {
                                if ($ad->getAnimal() === "Chien") {?>
                                    <img class='imagePet' src='../assets/img/nonPhotoChien.png' alt="Chien" >
                                    <?php
                                }
                                else { ?>
                                    <img class='imagePet' src='../assets/img/nonPhotoChat.png' alt="Chat">
                                    <?php
                                }
                            }
                            else { ?>
                                <img class='imagePet' src='<?=$ad->getPicture() ?>' alt="<?=$ad->getAnimal() ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class='flexColumn width_70 postAnimals'>
                            <p class='titlePet'><?=$ad->getAnimal() ?> (<?=$ad->getSex()?>)</p>
                            <p class='postDate colorBlue'><?=$date->format('d/m/Y') ?></p>
                            <p>Trouvé le : <span class='colorBlue'><?=$dateFind->format('d/m/Y') ?></span></p>
                            <p>Trouvé à : <span class='colorBlue'><?=$ad->getCity() ?></span></p>
                            <p>Race : <span class='colorBlue'><?=$ad->getRace() ?></span></p>
                            <?php
                            if($ad->getNumber() !== null && $ad->getNumber() !== "") {?>
                                <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> <?=$ad->getNumber() ?></span></p>
                                <?php
                            }
                            ?>
                            <p>Taille: <span class='colorBlue'><?=$ad->getSize() ?></span></p>
                            <p>Poils: <span class='colorBlue'><?=$ad->getFur() ?></span></p>
                            <p>Couleur du pelage : <span class='colorBlue'><?=$ad->getColor() ?></span></p>
                            <p>Robe : <span class='colorBlue'><?=$ad->getDress() ?></span> </p>
                            <p>Description : <span class='colorBlue'><?=$ad->getDescription() ?></span></p>
                        </div>
                    </a>
                    <?php
                }
                if ($var['ads'] === []) {?>
                    <p class="colorWhite margin_15_0 center categoriesAnimal">Il n'y a pas encore d'annonces !</p>
                    <?php
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
<?php } ?>

