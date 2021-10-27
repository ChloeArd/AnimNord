<?php
use Model\DB;

if (isset($var['ads'])) {?>

    <main class="width_80 flexColumn">
        <h1 class="title colorWhite flexCenter"> Chiens et chats trouvés</h1>
        <button id="filterCategories" class="buttonEnter colorWhite">Filtrer <i class="fas fa-sliders-h"></i></button>

        <?php
        $bdd = DB::getInstance();

        if (isset($_POST['animal']) || isset($_POST['sex']) || isset($_POST['size']) || isset($_POST['fur']) || isset($_POST['color']) ||
            isset($_POST['dress']) || isset($_POST['race']) || isset($_POST['number']) || isset($_POST['date']) || isset($_POST['city'])) {

            $animal = htmlentities($_POST['animal']);

            // We must know the animal
            $req = "SELECT * FROM adfind WHERE animal LIKE :animal";

            // If the user adds the sex, size, ... of the animal then we add its "filter" to the request to find it
            if(!empty($_POST['sex'])) {
                $sex = $_POST['sex'];
                $req .= " AND sex LIKE '%$sex%'";
            }

            if (!empty($_POST['size'])) {
                $size = $_POST['size'];
                $req .= " AND size LIKE '%$size%'";
            }

            if (!empty($_POST['fur'])) {
                $fur = $_POST['fur'];
                $req .= " AND fur LIKE '%$fur%'";
            }

            if(!empty($_POST['color'])) {
                if (count($_POST['color']) === 1) {
                    $color = $_POST['color'][0];
                }
                elseif (count($_POST['color']) === 2) {
                    $color = $_POST['color'][0] . ", " . $_POST['color'][1];
                }
                elseif (count($_POST['color']) === 3) {
                    $color = $_POST['color'][0] . ", " . $_POST['color'][1] . ", " . $_POST['color'][2];
                }
                elseif (count($_POST['color']) === 4) {
                    $color = $_POST['color'][0] . ", " . $_POST['color'][1] . ", " . $_POST['color'][2] . ", " . $_POST['color'][3];
                }
                elseif (count($_POST['color']) === 5) {
                    $color = $_POST['color'][0] . ", " . $_POST['color'][1] . ", " . $_POST['color'][2] . ", " . $_POST['color'][3] . ", " . $_POST['color'][4];
                }
                else {
                    $color = $_POST['color'][0] . ", " . $_POST['color'][1] . ", " . $_POST['color'][2] . ", " . $_POST['color'][3] . ", " . $_POST['color'][4] . ", " . $_POST['color'][5];
                }
                $req .= "AND color LIKE '%$color%'";
            }

            if(!empty($_POST['dress'])) {
                $dress = $_POST['dress'];
                $req .= " AND dress LIKE '%$dress%'";
            }

            if(!empty($_POST['race'])) {
                $race = htmlentities(ucfirst($_POST['race']));
                $req .= " AND race LIKE '%$race%'";
            }

            if(!empty($_POST['number'])) {
                $number = htmlentities(strtoupper($_POST['number']));
                $req .= " AND number LIKE '%$number%'";
            }

            if(!empty($_POST['city'])) {
                $city = $_POST['city'];
                $req .= " AND city LIKE '%$city%'";
            }

            if(!empty($_POST['date'])) {
                $date_find = $_POST['date'];
                $req .= " AND date_find LIKE '%$date_find%'";
            }
            $req .= " ORDER BY date DESC";

            $request = $bdd->prepare($req);
            $request->bindValue(":animal",  "%$animal%");
            $request->execute();
            $nb_resultats = $request->rowCount(); // count a result

            // if there is one result or several results we display the result (s) on the page
            if($nb_resultats != 0) { ?>
                <div class="flexRow">
                    <?php
                    $situation = "Perdu le :";
                    $true = true;?>
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/_Partials/formCategories.php";  ?>
                    <div id="containerLostAd">
                        <div class="flexCenter margin_15_0">
                            <?php
                            if($nb_resultats > 1) {?>
                                <p class="colorBlue">Résultat de votre recherche : <span class="bold colorRed"><?=$nb_resultats?> résultats trouvés.</span></p>
                                <?php
                            }
                            else { ?>
                                <p class="colorBlue">Résultat de votre recherche : <span class="bold colorRed"><?=$nb_resultats?> résultat trouvé.</span></p>
                                <?php
                            } ?>
                        </div>
                        <?php
                        foreach ($request as $donnees) {
                            $dateLost = new DateTime($donnees['date_find']);
                            $date = new DateTime($donnees['date']); ?>
                            <a href='../index.php?controller=adfind&action=adComment&id=<?=$donnees['id']?>&user=<?=$donnees['user_fk']?>&comment=commentLost' class='post postTransform flexRow flexCenter colorGrey'>
                                <div class='width_30'>
                                    <?php
                                    if ($donnees['picture'] === null || $donnees['picture'] === "") {
                                        if ($donnees['animal'] === "Chien") {?>
                                            <img class='imagePet' src='../assets/img/nonPhotoChien.png' alt="Chien" >
                                            <?php
                                        }
                                        else { ?>
                                            <img class='imagePet' src='../assets/img/nonPhotoChat.png' alt="Chat">
                                            <?php
                                        }
                                    }
                                    else { ?>
                                        <img class='imagePet' src='../assets/img/adFind/<?=$donnees['picture'] ?>' alt="<?=$donnees['animal'] ?>">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class='flexColumn width_70 postAnimals'>
                                    <p class='titlePet'><?=$donnees['animal'] ?> (<?=$donnees['sex']?>)</p>
                                    <p class='postDate colorBlue'><?=$date->format('d/m/Y') ?></p>
                                    <p>Trouvé le : <span class='colorBlue'><?=$dateLost->format('d/m/Y') ?></span></p>
                                    <p>Trouvé à : <span class='colorBlue'><?=$donnees['city'] ?></span></p>
                                    <p>Race : <span class='colorBlue'><?=$donnees['race'] ?></span></p>
                                    <?php
                                    if($donnees['number'] !== null && $donnees['number'] !== "") {?>
                                        <p>Numéro du tatouage ou de la puce : <span class="colorBlue"> <?=$donnees['number'] ?></span></p>
                                        <?php
                                    }
                                    ?>
                                    <p>Taille: <span class='colorBlue'><?=$donnees['size'] ?></span></p>
                                    <p>Poils: <span class='colorBlue'><?=$donnees['fur'] ?></span></p>
                                    <p>Couleur(s) du pelage : <span class='colorBlue'><?=$donnees['color'] ?></span></p>
                                    <p>Robe : <span class='colorBlue'><?=$donnees['dress'] ?></span> </p>
                                    <p>Description : <span class='colorBlue'><?=$donnees['description'] ?></span></p>
                                </div>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            // otherwise we say that there is no result
            else {?>
                <div class="flexRow">
                    <?php
                    $situation = "Perdu le :";
                    $true = true;?>
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/_Partials/formCategories.php";  ?>
                    <div id="containerLostAd">
                        <div class="flexCenter flexColumn">
                            <h2 class="colorRed margin_15_0">Pas de résultats !</h2>
                            <a class="colorGrey underline" href="../index.php?controller=adfind"><i class="fas fa-hand-point-right"></i>
                                Afficher tous les chiens et chats trouvés <i class="fas fa-hand-point-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        // if the user did not use the filter then we display all the ads
        else { ?>
            <div class="flexRow">
                <?php
                $situation = "Trouvé le :";
                $true = true;
                require_once $_SERVER['DOCUMENT_ROOT'] . "/View/_Partials/formCategories.php"; ?>
                <div id="containerLostAd">
                    <?php
                    foreach ($var['ads'] as $ad) {
                        $dateFind = new DateTime($ad->getDateFind());
                        $date = new DateTime($ad->getDate()); ?>
                        <a href='../index.php?controller=adfind&action=adComment&id=<?=$ad->getId()?>' class='post postTransform flexRow flexCenter colorGrey'>
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
                                    <img class='imagePet' src='../assets/img/adFind/<?=$ad->getPicture() ?>' alt="<?=$ad->getAnimal() ?>">
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
                                <p>Couleur(s) du pelage : <span class='colorBlue'><?=$ad->getColor() ?></span></p>
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
                    ?>
                </div>
            </div>
            <?php
        } ?>
    </main>
<?php } ?>