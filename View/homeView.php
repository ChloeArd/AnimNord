<?php
$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien déconnecté(e) !";
            break;
        case '1' :
            $return = "Vous avez bien supprimé votre compte";
            break;
        case '2' :
            $return = "Le contenu a été modifié !";
            break;
    }
}
?>
    <div id='<?= $id?>' class='modal2 colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main class=" width_100 flexColumn">
        <?php
        if (isset($var['content'])) {
            foreach ($var['content'] as $content) {
                if (isset($_SESSION['role_fk'])) {
                    if ($_SESSION['role_fk'] !== "2") {?>
                         <a href="../index.php?controller=content&action=update&id=<?=$content->getId()?>" class="colorWhite"><i class="far fa-edit editIndex buttonGreen"></i></a>
                        <?php
                    }
                }
                ?>
                <div class="flexCenter flexColumn">
                    <img class="backgroundPet" src="<?=$content->getPicture() ?>" alt="chien et chat">
                    <p class="question buttonWhite colorBlue flexCenter"><?=$content->getText1() ?></p>
                </div>
                <div class="helpIndex colorWhite"><?=$content->getText2() ?></div>
                <?php
            }
        } ?>

        <div id="#recentPost">
            <h2 class="center title2">Annonces récentes de chiens et de chats perdus</h2>
            <div class="width_80 flexRow flexCenter flexWrap">
                <?php
                if (isset($var['recentLost'])) {
                    foreach ($var['recentLost'] as $ad) {
                        $date = new DateTime($ad->getDateLost())?>
                        <a href='../index.php?controller=adlost&action=adComment&id=<?=$ad->getId() ?>' class='containerRecentPost flexColumn flexCenter radius10'>
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
                                <img class='imagePet' src='../assets/img/adLost/<?=$ad->getPicture() ?>' alt="<?=$ad->getAnimal() ?>">
                                <?php
                            }
                            ?>
                            <p class='margin8'><?=$ad->getRace() ?></p>
                            <p class='margin8'><i class="fas fa-calendar-day"></i><?=$date->format('d/m/Y') ?></p>
                            <p class='location'><i class='fas fa-search-location'></i><?=$ad->getCity() ?></p>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
            <a href="../index.php?controller=adlost" class="buttonEnter buttonCenter radius10 align flexCenter">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>

            <div class="separatorHorizontal"></div>
            <h2 class="center title2">Annonces récentes de chiens et de chats trouvés</h2>
            <div class="width_80 flexRow flexCenter flexWrap">
                <?php
                if (isset($var['recentFind'])) {
                    foreach ($var['recentFind'] as $ad) {
                        $date = new DateTime($ad->getDateFind())?>
                        <a href='../index.php?controller=adfind&action=adComment&id=<?=$ad->getId() ?>' class='containerRecentPost flexColumn flexCenter radius10'>
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
                                <img class='imagePet' src='../assets/img/adFind/<?=$ad->getPicture() ?>' alt="<?=$ad->getAnimal() ?>">
                                <?php
                            }
                            ?>
                            <p class='margin8'><?=$ad->getRace() ?></p>
                            <p class='margin8'><i class="fas fa-calendar-day"></i><?=$date->format('d/m/Y') ?></p>
                            <p class='location'><i class='fas fa-search-location'></i><?=$ad->getCity() ?></p>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
            <a href="../index.php?controller=adfind" class="buttonEnter buttonCenter radius10 align flexCenter">Allez sur les annonces <i class="fas fa-hand-point-right"></i></a>

            <div class="accountIndex">
                <?php
                if (isset($_SESSION["id"])) { ?>
                    <h2 class="title3 center">Vous avez perdu votre animal ? Ou vous avez trouvé un animal ?</h2>
                    <div id="connection_disconnection" class="flexRow flexCenter">
                        <a href="../index.php?controller=ad" class="buttonWhite2">Publier une annonce</a>
                    </div>
                    <?php
                }
                else { ?>
                    <h2 class="title3 center">Pas encore incrit ? ou pas encore connecté ?</h2>
                    <div id="connection_disconnection" class="flexRow flexCenter">
                        <a href="../index.php?controller=registration" class="buttonWhite2">Inscription</a>
                        <a href="../index.php?controller=connection" class="buttonWhite2">Connexion</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>