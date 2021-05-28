 <main>
    <div id="buttonAccount" class="buttonEnter colorWhite flexCenter">Mon compte <i class="fas fa-caret-down"></i></div>

    <div class="flexColumn marginAuto width_70" id="menuAccountMobile">
        <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes informations</a>
        <a href="../index.php?controller=adlost&action=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes annonces</a>
        <a href="../index.php?controller=adlost&favorite=view" class="colorGrey margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorGrey"></i>Mes favoris</a>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount"><i class="fas fa-chevron-circle-right colorOrange"></i>Gestion des utilisateurs</a>
            <?php
        } ?>
        <form method="post" action="../assets/php/disconnection.php">
            <span class="margin_0_20 linkAccount"><i class="fas fa-sign-out-alt colorRed"></i><input type="submit" class="disconnection buttonRed" value="Me déconnecter"></span>
        </form>
    </div>

    <div class="flexRow flexCenter" id="menuAccount">
        <a href="../index.php?controller=user&action=view&id=<?=$_SESSION['id'] ?>" class="colorBlue margin_0_20 linkAccount">Mes informations</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&action=view" class="colorBlue margin_0_20 linkAccount">Mes annonces</a>
        <div class="separatorVertical"></div>
        <a href="../index.php?controller=adlost&favorite=view&delete=ad" class="colorBlue margin_0_20 linkAccount">Mes favoris</a>
        <div class="separatorVertical"></div>
        <?php
        if ($_SESSION["role_fk"] === "1") { ?>
            <a href="../index.php?controller=user&action=all" class="colorOrange margin_0_20 linkAccount">Gestion des utilisateurs</a>
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
                    $dateLost = new DateTime($ad->getAdLostFk()->getDateLost());
                    $date = new DateTime($ad->getAdLostFk()->getDate()); ?>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?=$ad->getId() ?>">
                        <input type="hidden" name="adLost_fk" value="<?=$ad->getAdLostFk()->getId() ?>">
                        <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
                        <button type="submit" name="send"><i class='fas fa-star star size15'></i></button>
                    </form>
                    <a class='post postTransform flexRow flexCenter colorGrey'>
                        <div class='width_30'>
                            <?php
                            if ($ad->getAdLostFk()->getPicture() === null || $ad->getAdLostFk()->getPicture() === "") {
                                if ($ad->getAdLostFk()->getAnimal() === "Chien") {?>
                                    <img class='imagePet' src='../assets/img/nonPhotoChien.png' alt="Chien" >
                                    <?php
                                }
                                else { ?>
                                    <img class='imagePet' src='../assets/img/nonPhotoChat.png' alt="Chat">
                                    <?php
                                }
                            }
                            else { ?>
                                <img class='imagePet' src='../assets/img/adLost/<?=$ad->getAdLostFk()->getPicture() ?>' alt="<?=$ad->getAdLostFk()->getAnimal() ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class='flexColumn width_70 postAnimals'>
                            <p class='titlePet'><?=$ad->getAdLostFk()->getAnimal() ?> (<?=$ad->getAdLostFk()->getSex()?>)</p>
                            <p class='postDate colorBlue'><?=$date->format('d/m/Y') ?></p>
                            <p>Perdu le : <span class='colorBlue'><?=$dateLost->format('d/m/Y') ?></span></p>
                            <p>Perdu à : <span class='colorBlue'><?=$ad->getAdLostFk()->getCity() ?></span></p>
                            <p>Nom : <span class="colorBlue"><?=$ad->getAdLostFk()->getName() ?></span></p>
                            <p>Race : <span class='colorBlue'><?=$ad->getAdLostFk()->getRace() ?></span></p>
                            <?php
                            if($ad->getAdLostFk()->getNumber() !== null && $ad->getAdLostFk()->getNumber() !== "") {?>
                                <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> <?=$ad->getAdLostFk()->getNumber() ?></span></p>
                                <?php
                            } ?>
                            <p>Taille: <span class='colorBlue'><?=$ad->getAdLostFk()->getSize() ?></span></p>
                            <p>Poils: <span class='colorBlue'><?=$ad->getAdLostFk()->getFur() ?></span></p>
                            <p>Couleur(s) du pelage : <span class='colorBlue'><?=$ad->getAdLostFk()->getColor() ?></span></p>
                            <p>Robe : <span class='colorBlue'><?=$ad->getAdLostFk()->getDress() ?></span> </p>
                            <p>Description : <span class='colorBlue'><?=$ad->getAdLostFk()->getDescription() ?></span></p>
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
        }?>
    </div>
    <div>
        <h1 class="titleAccount">Mes favoris de chiens et de chats perdus</h1>
        <div id="containerLostAd" class="marginAuto">
            <?php
            if (isset($var['favoritesUserFind'])) {
            foreach ($var['favoritesUserFind'] as $ad) {
                $dateFind = new DateTime($ad->getAdFindFk()->getDateFind());
                $date = new DateTime($ad->getAdFindFk()->getDate()); ?>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?=$ad->getId() ?>">
                    <input type="hidden" name="adFind_fk" value="<?=$ad->getAdFindFk()->getId() ?>">
                    <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
                    <button type="submit" name="send"><i class='fas fa-star star size15'></i></button>
                </form>
                <a class='post postTransform flexRow flexCenter colorGrey'>
                    <div class='width_30'>
                        <?php
                        if ($ad->getAdFindFk()->getPicture() === null || $ad->getAdFindFk()->getPicture() === "") {
                            if ($ad->getAdFindFk()->getAnimal() === "Chien") {?>
                                <img class='imagePet' src='../assets/img/nonPhotoChien.png' alt="Chien" >
                                <?php
                            }
                            else { ?>
                                <img class='imagePet' src='../assets/img/nonPhotoChat.png' alt="Chat">
                                <?php
                            }
                        }
                        else { ?>
                            <img class='imagePet' src='../assets/img/adFind/<?=$ad->getAdFindFk()->getPicture() ?>' alt="<?=$ad->getAdFindFk()->getAnimal() ?>">
                            <?php
                        }
                        ?>
                    </div>
                    <div class='flexColumn width_70 postAnimals'>
                        <p class='titlePet'><?=$ad->getAdFindFk()->getAnimal() ?> (<?=$ad->getAdFindFk()->getSex()?>)</p>
                        <p class='postDate colorBlue'><?=$date->format('d/m/Y') ?></p>
                        <p>Trouvé le : <span class='colorBlue'><?=$dateFind->format('d/m/Y') ?></span></p>
                        <p>Trouvé à : <span class='colorBlue'><?=$ad->getAdFindFk()->getCity() ?></span></p>
                        <p>Race : <span class='colorBlue'><?=$ad->getAdFindFk()->getRace() ?></span></p>
                        <?php
                        if($ad->getAdFindFk()->getNumber() !== null && $ad->getAdFindFk()->getNumber() !== "") {?>
                            <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> <?=$ad->getAdFindFk()->getNumber() ?></span></p>
                            <?php
                        } ?>
                        <p>Taille: <span class='colorBlue'><?=$ad->getAdFindFk()->getSize() ?></span></p>
                        <p>Poils: <span class='colorBlue'><?=$ad->getAdFindFk()->getFur() ?></span></p>
                        <p>Couleur(s) du pelage : <span class='colorBlue'><?=$ad->getAdFindFk()->getColor() ?></span></p>
                        <p>Robe : <span class='colorBlue'><?=$ad->getAdFindFk()->getDress() ?></span> </p>
                        <p>Description : <span class='colorBlue'><?=$ad->getAdFindFk()->getDescription() ?></span></p>
                    </div>
                </a>
                <?php
            }  ?>
        </div>
        <?php
        if ($var['favoritesUserFind'] === []) {?>
            <p class="colorWhite margin_15_0 center categoriesAnimal">Tu n'as pas encore ajouté d'annonce dans tes favoris !</p>
            <?php
        }
    } ?>
    </div>

</main>