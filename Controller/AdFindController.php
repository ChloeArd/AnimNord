<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\CommentFind\CommentFindManager;
use Model\Entity\AdFind;
use Model\AdFind\AdFindManager;
use Model\User\UserManager;

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
    public function addAd($ad) {
        if (isset($ad['animal'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
            $ad['number'], $ad['description'], $ad['date_find'], $ad['date'], $ad['city'], $ad['picture'], $ad['user_fk'])) {

            $userManager = new UserManager();
            $adFindManager = new AdFindManager();

            $animal = htmlentities($ad['animal']);
            $sex = htmlentities($ad['sex']);
            $size = htmlentities($ad['size']);
            $fur = htmlentities($ad['fur']);
            $color = htmlentities($ad['color']);
            $dress = htmlentities($ad['dress']);
            $race = htmlentities(ucfirst($ad['race']));
            $number = htmlentities($ad['number']);
            $description = htmlentities(ucfirst($ad['description']));
            $date_find = htmlentities($ad['date_find']);
            $date = htmlentities($ad['date']);
            $city = htmlentities($ad['city']);
            $picture = htmlentities($ad['picture']);
            $user_fk = intval($ad['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $ad = new AdFind(null, $animal, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_find, $date, $city, $picture, $user_fk);
                $adFindManager->add($ad);
                header("Location: ../index.php?controller=adlost&action=view&success=0");
            }
        }
        $this->return("create/addFindView", "Anim'Nord : Ajouter une annonce de chiens et chats trouvés");
    }

    public function updateAd($ad) {
        if (isset($ad['id'], $ad['animal'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
            $ad['number'], $ad['description'], $ad['date_find'], $ad['date'], $ad['city'], $ad['picture'], $ad['user_fk'])) {

            $userManager = new UserManager();
            $adFindManager = new AdFindManager();

            $id = intval($ad['id']);
            $animal = htmlentities($ad['animal']);
            $sex = htmlentities($ad['sex']);
            $size = htmlentities($ad['size']);
            $fur = htmlentities($ad['fur']);
            $color = htmlentities($ad['color']);
            $dress = htmlentities($ad['dress']);
            $race = htmlentities(ucfirst($ad['race']));
            $number = htmlentities($ad['number']);
            $description = htmlentities(ucfirst($ad['description']));
            $date_find = htmlentities($ad['date_find']);
            $date = htmlentities($ad['date']);
            $city = htmlentities($ad['city']);
            $picture = htmlentities($ad['picture']);
            $user_fk = intval($ad['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $ad = new AdFind($id, $animal, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_find, $date, $city, $picture, $user_fk);
                $adFindManager->update($ad);
            }
            header("Location: ../index.php?controller=adlost&action=view&success=1");
        }
        $this->return("update/updateFindView", "Anim'Nord : Modifier une annonce");
    }

    /**
     * delete an ad using its id
     * @param $ad
     */
    public function deleteAd($ad) {
        if (isset($ad['id'], $ad['user_fk'])) {
            $userManager = new UserManager();
            $adFindManager = new AdFindManager();

            $id = intval($ad['id']);
            $user_fk = intval($ad['user_fk']);

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