<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\FavoriteFind\FavoriteFindManager;
use Model\User\UserManager;
use Model\Entity\FavoriteLost;
use Model\FavoriteLost\FavoriteLostManager;

class FavoriteLostController {

    use ReturnViewTrait;

    /**
     * Displays the favorites of the ads of lost dogs and cats to a single user.
     * @param int $user_fk
     */
    public function favoritesUser(int $user_fk) {
        $manager = new FavoriteLostManager();
        $managerFind = new FavoriteFindManager();
        $this->return("favoritesAccountView", "Anim'Nord : Mes favoris",
            ['favoritesUser' => $manager->favoritesByUser($user_fk),
             'favoritesUserFind' => $managerFind->favoritesByUser($user_fk)]);
    }

    /**
     * See if the user has bookmarked the ad.
     * @param $adLost_fk
     * @param $user_fk
     */
    public function favorite($adLost_fk, $user_fk) {
        $manager = new FavoriteLostManager();
        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['favoritesUser' => $manager->favorite($adLost_fk,$user_fk)]);
    }

    /**
     * Add a ad lost in lost favorite.
     * @param $favoriteLost
     */
    public function addFavorite($id, $user) {
        if ($_GET['id']) {
            $userManager = new UserManager();
            $adlostManager = new AdLostManager();
            $favoriteManager = new FavoriteLostManager();

            $user_fk = $userManager->getUser($user);
            $adLost_fk = $adlostManager->getAd($id);
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
                    $favorite = new FavoriteLost($id);
                    $favoriteManager->delete($favorite);
                }
            }
        }
        $this->return("favoritesAccountView", "Anim'Nord : Mes favoris");
    }
}