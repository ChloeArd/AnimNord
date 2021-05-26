<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\CommentFind\CommentFindManager;
use Model\Entity\AdFind;
use Model\AdFind\AdFindManager;
use Model\User\UserManager;
use function Controller\Traits\getRandomName;

class AdFindController {

    use ReturnViewTrait;

    /**
     * Display the list of cats and dogs finds ad.
     */
    public function ads() {
        $manager = new AdFindManager();
        $this->return("findView", "Anim'Nord : Trouvés", ['ads' => $manager->getAds()]);
    }

    /**
     * @param int $id
     */
    public function ad(int $id) {
        $managerAd = new AdFindManager();
        $managerComment = new CommentFindManager();
        $this->return("adFindCommentView", "Anim'Nord : Annonce", ['ad' => $managerAd->getAd2($id),
                                                                             'comment' => $managerComment->getCommentsAd($id)]);
    }

    /**
     * @param int $user_fk
     */
    public function adsUser(int $user_fk) {
        $manager = new AdFindManager();
        $this->return("adAccountView", "Anim'Nord : Mes annonces", ['adsUserFind' => $manager->adsByUser($user_fk)]);
    }

    /**
     * add a ad
     * @param $ad
     */
    public function addAd($ad, $files) {
        if (isset($_SESSION["id"])) {
            if (isset($ad['animal'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
                $ad['number'], $ad['description'], $ad['date_find'], $ad['date'], $ad['city'], $files['picture'], $ad['user_fk'])) {
                $userManager = new UserManager();
                $adFindManager = new AdFindManager();

                $animal = $ad['animal'];
                $sex = $ad['sex'];
                $size = $ad['size'];
                $fur = $ad['fur'];
                $dress = $ad['dress'];
                $race = htmlentities(ucfirst($ad['race']));
                $number = htmlentities(strtoupper($ad['number']));
                $description = htmlentities(ucfirst($ad['description']));
                $date_find = $ad['date_find'];
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

                        move_uploaded_file($tmpName, "./assets/img/adFind/" . $namePicture);

                        $user_fk = $userManager->getUser($user_fk);
                        if ($user_fk->getId()) {
                            $ad = new AdFind(null, $animal, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_find, $date, $city, $namePicture, $user_fk);
                            $adFindManager->add($ad);
                            header("Location: ../index.php?controller=adlost&action=view&success=0");
                        }
                    } else {
                        header("Location: ../index.php?controller=adfind&action=new&error=1");
                    }
                } else {
                    header("Location: ../index.php?controller=adfind&action=new&error=0");
                }
            }
            $this->return("create/addFindView", "Anim'Nord : Ajouter une annonce de chiens et chats trouvés");
        }
    }

    public function updateAd($ad) {
        if (isset($_SESSION["id"])) {
            if (isset($ad['id'], $ad['animal'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
                $ad['number'], $ad['description'], $ad['date_find'], $ad['date'], $ad['city'], $ad['picture'], $ad['user_fk'])) {

                $userManager = new UserManager();
                $adFindManager = new AdFindManager();

                $id = intval($ad['id']);
                $animal = $ad['animal'];
                $sex = $ad['sex'];
                $size = $ad['size'];
                $fur = $ad['fur'];
                $dress = $ad['dress'];
                $race = htmlentities(ucfirst($ad['race']));
                $number = htmlentities(strtoupper($ad['number']));
                $description = htmlentities(ucfirst($ad['description']));
                $date_find = $ad['date_find'];
                $date = $ad['date'];
                $city = $ad['city'];
                $picture = htmlentities($ad['picture']);
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

                $user_fk = $userManager->getUser($user_fk);
                if ($user_fk->getId()) {
                    $ad = new AdFind($id, $animal, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_find, $date, $city, $picture, $user_fk);
                    $adFindManager->update($ad);
                    header("Location: ../index.php?controller=adlost&action=view&success=1");
                }
            }
            $this->return("update/updateFindView", "Anim'Nord : Modifier une annonce");
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
                $adFindManager = new AdFindManager();

                $id = intval($ad['id']);
                $user_fk = intval($ad['user_fk']);
                $picture = htmlentities($ad['picture']);

                unlink("./assets/img/adFind/$picture");

                $user_fk = $userManager->getUser($user_fk);
                if ($user_fk->getId()) {
                    $adFind = new AdFind($id);
                    $adFindManager->delete($adFind);
                    header("Location: ../index.php?controller=adlost&action=view&success=2");
                }
            }
            $this->return("delete/deleteFindView", "Anim'Nord : Supprimer une annonce");
        }
    }
}