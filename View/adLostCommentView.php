<?php
if (isset($var['ad'])) {
    ?>
    <main>
        <div>
            <div id="containerLostAd" class="marginAuto">
                <?php
                foreach ($var['ad'] as $ad) {
                $dateLost = new DateTime($ad->getDateLost());
                $date = new DateTime($ad->getDate());
                if ($_SESSION['role_fk'] !== "2") {?>
                    <a class="colorWhite position1 edit1 size20" href="../index.php?controller=adlost&action=update&id=<?=$ad->getId() ?>"><i class="far fa-edit"></i></a>
                    <a class="colorWhite position1 delete1 size20" href="../index.php?controller=adlost&action=delete&id=<?=$ad->getId() ?>"><i class="far fa-trash-alt"></i></a>
                <?php }?>
                <form method="post" action="">
                    <input type="hidden" name="adLost_fk" value="<?=$ad->getId() ?>">
                    <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
                    <button type="submit" name="send"><i class='far fa-star star2 size20'></i></button>
                </form>
                <div class='post flexColumn flexCenter colorGrey'>
                    <h1 class='colorWhite margin_15_0 center categoriesAnimal width_100'><?=$ad->getAnimal() ?> perdu : <?=$ad->getName() ?></h1>
                    <div class='width_70 margin_15_0 flexCenter flexColumn'>
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
                        <p class='colorGrey size12'>Date de la publication : <span class="colorBlue"><?=$date->format('d/m/Y') ?></span></p>
                    </div>
                    <div class='flexColumn width_70 postAnimals table'>
                        <p>Sexe : <span class="colorBlue"><?=$ad->getSex()?></span></p>
                        <p>Perdu le : <span class='colorBlue'><?=$dateLost->format('d/m/Y') ?></span></p>
                        <p>Perdu à : <span class='colorBlue'><?=$ad->getCity() ?></span></p>
                        <p>Nom : <span class="colorBlue"><?=$ad->getName() ?></span></p>
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
                    <div class="userAd flexColumn">
                        <p class="size20 center margin8">Vous l'avez trouvés ?</p>
                        <p>Veuillez contacter : <span class="size18 bold"><?=$ad->getUserFk()->getFirstname() ?> <?=$ad->getUserFk()->getLastname() ?></span></p>
                        <a href="#" class="buttonWhite margin8 colorRed"><i class="far fa-comment-dots"></i>Envoyer un message</a>
                        <a href="#" class="buttonWhite margin8 colorRed"><i class="far fa-envelope"></i>Envoyer un E-mail</a>
                        <a href="tel:+<?=$ad->getUserFk()->getPhone() ?>" class="buttonWhite margin8 colorRed "><i class="fas fa-phone-alt"></i>Contacter par téléphone : <?=$ad->getUserFk()->getPhone() ?></a>
                    </div>
                </div>
            </div>

            <div class="width_80">
                <div class="separatorHorizontal"></div>
            </div>

            <div class="flexRow width_80">
                <?php if (isset($_SESSION["id"])) {
                    ?>
                    <a href="#" class="buttonComment"> Ajouter un commentaire</a>
                        <?php
                    }
                    else { ?>
                        <a href="/View/connect.php" class="buttonComment"> Ajouter un commentaire</a>
                        <span class="colorGrey flexCenter size12">Tu dois te connecter pour t'inscrire.</span>
                    <?php
                    }
                    ?>
                </div>

                <div id="comments" class="width_80">
                    <h1 class='colorWhite margin_15_0 center categoriesAnimal width_100'>Commentaires</h1>
                    <div class="commentArticle">
                        <h3 class="margin_15_0 co">Prénom NOM - date</h3>
                        <p>contenue..</p>
                    </div>
                </div>
                <?php
                }
            ?>
        </div>
    </main>
    <?php
}