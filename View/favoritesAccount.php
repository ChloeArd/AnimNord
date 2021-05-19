<?php

?>
    <main>
        <div class="flexRow flexCenter" id="menuAccount">
            <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
            <div class="separatorVertical"></div>
            <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
            <div class="separatorVertical"></div>
            <a href="../index.php?controller=adlost&favorite=view" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
            <div class="separatorVertical"></div>
            <a href="../index.php?controller=message" class="colorBlue margin_0_20 linkAccount">Mes messages</a>
            <div class="separatorVertical"></div>
            <?php
            if ($_SESSION["role_fk"] === "1") { ?>
                <a href="../index.php?controller=user&action=all&search=ok" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
                <div class="separatorVertical"></div>
                <?php
            } ?>
            <form method="post" action="../assets/php/disconnection.php">
                <input type="submit" class="disconnection buttonRed linkAccount margin_0_20" value="Me déconnecter">
            </form>
        </div>

        <div>
            <h1 class="titleAccount">Mes favoris de chiens et de chats perdus</h1>
            <div id="containerLostAd" class="marginAuto">
        <?php
        if (isset($var['favoritesUser'])) {
            foreach ($var['favoritesUser'] as $ad) {
                $dateLost = new DateTime($ad->getDateLost());
                $date = new DateTime($ad->getDate()); ?>
                <a class="colorBlack" href="../index.php?controller=adlost&action=update&id=<?=$ad->getId() ?>"><i class="far fa-edit"></i></a>
                <a class="colorBlack" href="../index.php?controller=adlost&action=delete&id=<?=$ad->getId() ?>"><i class="far fa-trash-alt"></i></a>
                <a class='colorBlack' href=''><i class='far fa-star star'></i></a>
                <a class='post flexRow flexCenter colorGrey'>
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
                            <img class='imagePet' src='../assets/img/adLost/<?=$ad->getPicture() ?>' alt="<?=$ad->getAnimal() ?>">
                            <?php
                        }
                        ?>
                    </div>
                    <div class='flexColumn width_70 postAnimals'>
                        <p class='titlePet'><?=$ad->getAnimal() ?> (<?=$ad->getSex()?>)</p>
                        <p class='postDate colorBlue'><?=$date->format('d/m/Y') ?></p>
                        <p>Perdu le : <span class='colorBlue'><?=$dateLost->format('d/m/Y') ?></span></p>
                        <p>Perdu à : <span class='colorBlue'><?=$ad->getCity() ?></span></p>
                        <p>Nom : <span class="colorBlue"><?=$ad->getName() ?></span></p>
                        <p>Race : <span class='colorBlue'><?=$ad->getRace() ?></span></p>
                        <?php
                        if(!is_null($ad->getNumber())) {?>
                            <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> <?=$ad->getNumber() ?></span></p>
                            <?php
                        } ?>
                        <p>Taille: <span class='colorBlue'><?=$ad->getSize() ?></span></p>
                        <p>Poils: <span class='colorBlue'><?=$ad->getFur() ?></span></p>
                        <p>Couleur du pelage : <span class='colorBlue'><?=$ad->getColor() ?></span></p>
                        <p>Robe : <span class='colorBlue'><?=$ad->getDress() ?></span> </p>
                        <p>Description : <span class='colorBlue'><?=$ad->getDescription() ?></span></p>
                    </div>
                </a>
                <?php
            }  ?>
            </div>
            <?php
            if ($var['favoritesUser'] === []) {?>
                <p class="colorWhite margin_15_0 center categoriesAnimal">Tu n'as pas encore publié d'annonce !</p>
                <?php
            }
        }
        ?>
            <h1 class="titleAccount">Mes favoris de chiens et chats perdus</h1>
            <p class="colorWhite margin_15_0 center categoriesAnimal">Tu n'as pas encore ajouté d'annonce dans tes favoris !</p>
        </div>
    </main>