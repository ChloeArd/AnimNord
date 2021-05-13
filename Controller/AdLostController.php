<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdFind\AdFindManager;
use Model\CommentLost\CommentLostManager;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\User\UserManager;

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
     * @param int $id
     */
    public function ad(int $id) {
        $managerAd = new AdLostManager();
        $managerComment = new CommentLostManager();
        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['ad' => $managerAd->getAd2($id),
                                                                             'comment' => $managerComment->getCommentsAd($id)]);
    }

    /**
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
    public function addAd($ad) {
        if (isset($ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
        $ad['number'], $ad['description'], $ad['date_lost'], $ad['date'], $ad['city'], $ad['picture'], $ad['user_fk'])) {

            $userManager = new UserManager();
            $adlostManager = new AdLostManager();

            $animal = htmlentities($ad['animal']);
            $name = htmlentities(ucfirst($ad['name']));
            $sex = htmlentities($ad['sex']);
            $size = htmlentities($ad['size']);
            $fur = htmlentities($ad['fur']);
            $color = htmlentities($ad['color']);
            $dress = htmlentities($ad['dress']);
            $race = htmlentities(ucfirst($ad['race']));
            $number = htmlentities($ad['number']);
            $description = htmlentities(ucfirst($ad['description']));
            $date_lost = htmlentities($ad['date_lost']);
            $date = htmlentities($ad['date']);
            $city = htmlentities($ad['city']);
            $picture = htmlentities($ad['picture']);
            $user_fk = intval($ad['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $ad = new AdLost(null, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $picture, $user_fk);
                $adlostManager->add($ad);
                header("Location: ../index.php?controller=adlost&action=view&success=3");
            }
        }
        $this->return("create/addLostView", "Anim'Nord : Ajouter une annonce de chiens et chats perdus");
    }

    public function updateAd($ad) {
        if (isset($ad['id'], $ad['animal'], $ad['name'], $ad['sex'], $ad['size'], $ad['fur'], $ad['color'], $ad['dress'], $ad['race'],
            $ad['number'], $ad['description'], $ad['date_lost'], $ad['date'], $ad['city'], $ad['picture'], $ad['user_fk'])) {

            $userManager = new UserManager();
            $adlostManager = new AdLostManager();

            $id = intval($ad['id']);
            $animal = htmlentities($ad['animal']);
            $name = htmlentities(ucfirst($ad['name']));
            $sex = htmlentities($ad['sex']);
            $size = htmlentities($ad['size']);
            $fur = htmlentities($ad['fur']);
            $color = htmlentities($ad['color']);
            $dress = htmlentities($ad['dress']);
            $race = htmlentities(ucfirst($ad['race']));
            $number = htmlentities($ad['number']);
            $description = htmlentities(ucfirst($ad['description']));
            $date_lost = htmlentities($ad['date_lost']);
            $date = htmlentities($ad['date']);
            $city = htmlentities($ad['city']);
            $picture = htmlentities($ad['picture']);
            $user_fk = intval($ad['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $ad = new AdLost($id, $animal, $name, $sex, $size, $fur, $color, $dress, $race, $number, $description, $date_lost, $date, $city, $picture, $user_fk);
                $adlostManager->update($ad);
                header("Location: ../index.php?controller=adlost&action=view&success=1");
            }
        }
        $this->return("update/updateLostView", "Anim'Nord : Modifier une annonce");
    }

    /**
     * delete an ad using its id
     * @param $ad
     */
    public function deleteAd($ad) {
        if (isset($ad['id'], $ad['user_fk'])) {
            $userManager = new UserManager();
            $adlostManager = new AdLostManager();

            $id = intval($ad['id']);
            $user_fk = intval($ad['user_fk']);

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