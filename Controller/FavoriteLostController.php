<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Exception;
use http\Url;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\FavoriteLost;
use Model\AdLost\FavoriteLostManager;

class FavoriteLostController {

    use ReturnViewTrait;

    /**
     * @param int $user_fk
     */
    public function favoritesUser(int $adLost_fk, int $user_fk) {
        $manager = new FavoriteLostManager();
        $favorites = $manager->favoritesByUser($adLost_fk, $user_fk);

        $this->return("", "Anim'Nord : Mes favoris", ['favoritesUser' => $favorites]);
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