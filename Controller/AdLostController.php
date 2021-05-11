<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Exception;
use http\Url;
use Model\AdFind\AdFindManager;
use Model\CommentLost\CommentLostManager;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\Entity\User;
use Model\User\UserManager;

class AdLostController {

    use ReturnViewTrait;

    /**
     * Display the list of cats and dogs lost ad.
     */
    public function ads() {
        $manager = new AdLostManager();
        $adLost = $manager->getAds();

        $this->return("lostView", "Anim'Nord : Perdus", ['ads' => $adLost]);
    }

    /**
     * @param int $id
     */
    public function ad(int $id) {
        $manager = new AdLostManager();
        $adLost = $manager->getAd2($id);
        $manager = new CommentLostManager();
        $commentLost = $manager->getCommentsAd($id);

        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['ad' => $adLost, 'comment' => $commentLost]);
    }

    /**
     * @param int $user_fk
     */
    public function adsUser(int $user_fk) {
        $manager = new AdLostManager();
        $adLost = $manager->adsByUser($user_fk);
        $manager = new AdFindManager();
        $adFind = $manager->adsByUser($user_fk);

        $this->return("adAccountView", "Anim'Nord : Mes annonces", ['adsUser' => $adLost, 'adsUserFind' => $adFind]);
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
            }
        }

        $this->return("addLostView", "Anim'Nord : Ajouter une annonce de chiens et chats perdus");
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
            }
        }

        $this->return("updateLostView", "Anim'Nord : Modifier une annonce");
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
            }
        }
        $this->return("deleteLostView", "Anim'Nord : Supprimer une annonce");

    }
}