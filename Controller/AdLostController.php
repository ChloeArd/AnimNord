<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdFind\AdFindManager;
use Model\CommentLost\CommentLostManager;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\User\UserManager;
use function Model\getRandomName;

class AdLostController {

    use ReturnViewTrait;

    /**
     * Display the list of cats and dogs lost ad.
     */
    public function ads() {
        $manager = new AdLostManager();
        $this->return("lostView", "Anim'Nord : Perdus", ['ads' => $manager->getAds()]);
    }

    /**
     * Displays an ad by its ID, and displays comments by the ad ID.
     * @param int $id
     */
    public function ad(int $id) {
        $managerAd = new AdLostManager();
        $managerComment = new CommentLostManager();
        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['ad' => $managerAd->getAd2($id),
                                                                             'comment' => $managerComment->getCommentsAd($id)]);
    }

    /**
     * Displays user announcements.
     * @param int $user_fk
     */
    public function adsUser(int $user_fk) {
        $managerLost = new AdLostManager();
        $managerFind = new AdFindManager();
        $this->return("adAccountView", "Anim'Nord : Mes annonces", ['adsUser' => $managerLost->adsByUser($user_fk), 'adsUserFind' => $managerFind->adsByUser($user_fk)]);
    }

    /**
     * add a ad
     * @param $ad
     */
    public function addAd($ad, $files) {
        if (isset($_SESSION["id"])) {
            if (isset($ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['dress'], $ad['race'],
                $ad['number'], $ad['description'], $ad['date_lost'], $ad['date'], $ad['city'], $files['picture'], $ad['user_fk'])) {
                $userManager = new UserManager();
                $adlostManager = new AdLostManager();

                $animal = $ad['animal'];
                $name = htmlentities(ucfirst($ad['name']));
                $sex = $ad['sex'];
                $size = $ad['size'];
                $fur = $ad['fur'];
                $dress = $ad['dress'];
                $race = htmlentities(ucfirst($ad['race']));
                $number = htmlentities(strtoupper($ad['number']));
                $description = htmlentities(ucfirst($ad['description']));
                $date_lost = $ad['date_lost'];
                $date = $ad['date'];
                $city = $ad['city'];
                $user_fk = intval($ad['user_fk']);

                // I check if the input of name "color" exists.
                if (isset($ad['color'])) {
                    // I count the number of boxes that have been checked, ie the number of colors it contains.
                    if (count($ad['color']) === 1) {
                        // I store the colors in a variable.
                        $color = $ad['color'][0];
                    }
                    elseif (count($ad['color']) === 2) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1];
                    }
                    elseif (count($ad['color']) === 3) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2];
                    }
                    elseif (count($ad['color']) === 4) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3];
                    }
                    elseif (count($ad['color']) === 5) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4];
                    }
                    else {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4] . ", " . $ad['color'][5];
                    }
                }
                else {
                    header("Location: ../index.php?controller=adlost&action=new&error=2");
                }

                // If the user added an image.
                if (!empty($files['picture']['name'])) {
                    // I check if he is the right type.
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 6 * 1024 * 1024; // = 6 Mo

                        // if it is less than or equal to 6 MB.
                        if ($files['picture']['size'] <= $maxSize) {
                            $tmpName = $files['picture']['tmp_name'];
                            // I give it a random name made up of numbers and letters.
                            $namePicture = getRandomName($files['picture']['name']);
                            // I add the image in the corresponding folder to store it and retrieve it when I want.
                            move_uploaded_file($tmpName, "./assets/img/adLost/" . $namePicture);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $ad = new AdLost(null, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $namePicture, $user_fk);
                                $adlostManager->add($ad);
                                header("Location: ../index.php?controller=adlost&action=view&success=3");
                            }
                        } else {
                            header("Location: ../index.php?controller=adlost&action=new&error=1");
                        }
                    } else {
                        header("Location: ../index.php?controller=adlost&action=new&error=0");
                    }
                }
                // If the user has not added an image, we add the ad without an image, because the image is null.
                else {
                    $picture = $files['picture']['name'];
                    $user_fk = $userManager->getUser($user_fk);
                    if ($user_fk->getId()) {
                        $ad = new AdLost(null, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $picture, $user_fk);
                        $adlostManager->add($ad);
                        header("Location: ../index.php?controller=adlost&action=view&success=3");
                    }
                }
            }
            $this->return("create/addLostView", "Anim'Nord : Ajouter une annonce de chiens et chats perdus");
        }
    }

    /**
     * update a ad
     * @param $ad
     * @param $files
     */
    public function updateAd($ad, $files) {
        if (isset($_SESSION["id"])) {
            if (isset($ad['id'], $ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['dress'], $ad['race'],
                $ad['number'], $ad['description'], $ad['date_lost'], $ad['date'], $ad['city'], $files['picture'], $ad['picture2'], $ad['user_fk'])) {

                $userManager = new UserManager();
                $adlostManager = new AdLostManager();

                $id = intval($ad['id']);
                $animal = $ad['animal'];
                $name = htmlentities(ucfirst($ad['name']));
                $sex = $ad['sex'];
                $size = $ad['size'];
                $fur = $ad['fur'];
                $dress = $ad['dress'];
                $race = htmlentities(ucfirst($ad['race']));
                $number = htmlentities(strtoupper($ad['number']));
                $description = htmlentities(ucfirst($ad['description']));
                $date_lost = $ad['date_lost'];
                $date = $ad['date'];
                $city = $ad['city'];
                $picture = htmlentities($ad['picture2']);
                $user_fk = intval($ad['user_fk']);

                if (isset($ad['color'])) {
                    if (count($ad['color']) === 1) {
                        $color = $ad['color'][0];
                    }
                    elseif (count($ad['color']) === 2) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1];
                    }
                    elseif (count($ad['color']) === 3) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2];
                    }
                    elseif (count($ad['color']) === 4) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3];
                    }
                    elseif (count($ad['color']) === 5) {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4];
                    }
                    else {
                        $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4] . ", " . $ad['color'][5];
                    }
                }
                else {
                    header("Location: ../index.php?controller=adlost&action=update&id=$id&error=2");
                }

                if (!empty($files['picture']['name'])) {
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 6 * 1024 * 1024; // = 6 Mo

                        if ($files['picture']['size'] <= $maxSize) {
                            $tmpName = $files['picture']['tmp_name'];
                            $namePicture = getRandomName($files['picture']['name']);

                            move_uploaded_file($tmpName, "./assets/img/adLost/" . $namePicture);
                            unlink("./assets/img/adLost/" . $picture);

                            $user_fk = $userManager->getUser($user_fk);
                            if ($user_fk->getId()) {
                                $ad = new AdLost($id, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $namePicture, $user_fk);
                                $adlostManager->update($ad);
                                header("Location: ../index.php?controller=adlost&action=view&success=1");
                            }
                        }
                        else {
                            header("Location: ../index.php?controller=adlost&action=update&id=$id&error=1");
                        }
                    }
                    else {
                        header("Location: ../index.php?controller=adlost&action=update&id=$id&error=0");
                    }

                }
                else {
                    $user_fk = $userManager->getUser($user_fk);
                    if ($user_fk->getId()) {
                        $ad = new AdLost($id, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $picture, $user_fk);
                        $adlostManager->update($ad);
                        header("Location: ../index.php?controller=adlost&action=view&success=1");
                    }
                }
            }
            $this->return("update/updateLostView", "Anim'Nord : Modifier une annonce");
        }
    }

    /**
     * delete an ad using its id
     * @param $ad
     */
    public function deleteAd($ad) {
        if (isset($_SESSION["id"])) {
            if (isset($ad['id'], $ad['user_fk'], $ad['picture'])) {
                $userManager = new UserManager();
                $adlostManager = new AdLostManager();

                $id = intval($ad['id']);
                $user_fk = intval($ad['user_fk']);
                $picture = htmlentities($ad['picture']);

                $user_fk = $userManager->getUser($user_fk);
                if ($picture === "" || $picture === null) {
                    if ($user_fk->getId()) {
                        $adlost = new AdLost($id);
                        $adlostManager->delete($adlost);
                        header("Location: ../index.php?controller=adlost&action=view&success=2");
                    }
                }
                else {
                    if ($user_fk->getId()) {
                        unlink("./assets/img/adLost/" . $picture);
                        $adlost = new AdLost($id);
                        $adlostManager->delete($adlost);
                        header("Location: ../index.php?controller=adlost&action=view&success=2");
                    }
                }
            }
            $this->return("delete/deleteLostView", "Anim'Nord : Supprimer une annonce");
        }
    }
}