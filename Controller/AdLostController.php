<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdFind\AdFindManager;
use Model\CommentLost\CommentLostManager;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\User\UserManager;
use function Controller\Traits\getRandomName;

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
            if (isset($ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
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

                if (count($ad['color']) === 1) {
                    $color = $ad['color'][0];
                } elseif (count($ad['color']) === 2) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1];
                } elseif (count($ad['color']) === 3) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2];
                } elseif (count($ad['color']) === 4) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3];
                } elseif (count($ad['color']) === 5) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4];
                } else {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4] . ", " . $ad['color'][5];
                }

                if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                    $maxSize = 2 * 1024 * 1024; // = 2 Mo

                    if ($files['picture']['size'] <= $maxSize) {
                        $tmpName = $files['picture']['tmp_name'];
                        $namePicture = getRandomName($files['picture']['name']);

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
            if (isset($ad['id'], $ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
                $ad['number'], $ad['description'], $ad['date_lost'], $ad['date'], $ad['city'], $ad['picture2'], $ad['user_fk'])) {

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

                if (count($ad['color']) === 1) {
                    $color = $ad['color'][0];
                } elseif (count($ad['color']) === 2) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1];
                } elseif (count($ad['color']) === 3) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2];
                } elseif (count($ad['color']) === 4) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3];
                } elseif (count($ad['color']) === 5) {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4];
                } else {
                    $color = $ad['color'][0] . ", " . $ad['color'][1] . ", " . $ad['color'][2] . ", " . $ad['color'][3] . ", " . $ad['color'][4] . ", " . $ad['color'][5];
                }

                if (isset($ad['picture'])) {
                    if (in_array($files['picture']['type'], ['image/jpg', 'image/jpeg', 'image/png', ".jpg"])) {
                        $maxSize = 2 * 1024 * 1024; // = 2 Mo

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
                        } else {
                            header("Location: ../index.php?controller=adlost&action=update&id=$id&error=1");
                        }
                    } else {
                        header("Location: ../index.php?controller=adlost&action=update&id=$id&error=0");
                    }

                } else {
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

                unlink("./assets/img/adLost/" . $picture);

                $user_fk = $userManager->getUser($user_fk);
                if ($user_fk->getId()) {
                    $adlost = new AdLost($id);
                    $adlostManager->delete($adlost);
                    header("Location: ../index.php?controller=adlost&action=view&success=2");
                }
            }
            $this->return("delete/deleteLostView", "Anim'Nord : Supprimer une annonce");
        }
    }
}