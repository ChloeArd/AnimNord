<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\FavoriteLost;
use Model\FavoriteLost\FavoriteLostManager;

class FavoriteLostController {

    use ReturnViewTrait;

    /**
     * Displays the favorites of the ads of lost dogs and cats to a single user.
     * @param int $user_fk
     */
    public function favoritesUser(int $adLost_fk, int $user_fk) {
        $manager = new FavoriteLostManager();
        $favorites = $manager->favoritesByUser($adLost_fk, $user_fk);

        $this->return("", "Anim'Nord : Mes favoris", ['favoritesUser' => $favorites]);
    }

    /**
     * Add a ad lost in lost favorite.
     * @param $favoriteLost
     */
    public function addFavorite($favoriteLost) {
        if (isset($favoriteLost['adLost_fk'], $favoriteLost['user_fk'])) {
            $userManager = new UserManager();
            $adlostManager = new AdLostManager();
            $favoriteManager = new FavoriteLostManager();

            $adLost_fk = intval($favoriteLost['adLost_fk']);
            $user_fk = intval($favoriteLost['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $adLost_fk = $adlostManager->getAd($adLost_fk);
            if($user_fk->getId()) {
                if ($adLost_fk->getId()) {
                    $favorite = new FavoriteLost(null, $adLost_fk, $user_fk);
                    $favoriteManager->add($favorite);
                }
            }
        }
        $this->return("adLostCommentView", "Anim'Nord : Annonce");
    }

    /**
     * Delete a favorite lost using its id.
     * @param $favoriteLost
     */
    public function deleteFavorite($favoriteLost) {
        if (isset($favoriteLost['id'], $favoriteLost['adLost_fk'], $favoriteLost['user_fk'])) {
            $userManager = new UserManager();
            $adlostManager = new AdLostManager();
            $favoriteManager = new FavoriteLostManager();

            $id = intval($favoriteLost['id']);
            $adLost_fk = intval($favoriteLost['adLost_fk']);
            $user_fk = intval($favoriteLost['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $adLost_fk = $adlostManager->getAd($adLost_fk);
            if ($user_fk->getId()) {
                if ($adLost_fk->getId()) {
                    $adlost = new AdLost($id);
                    $adlostManager->delete($adlost);
                }
            }
        }
    }
}