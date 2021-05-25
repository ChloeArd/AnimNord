<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdFind\AdFindManager;
use Model\User\UserManager;
use Model\Entity\FavoriteFind;
use Model\FavoriteFind\FavoriteFindManager;

class FavoriteFindController {

    use ReturnViewTrait;

    /**
     * Displays the favorites of the ads of find dogs and cats to a single user.
     * @param int $user_fk
     */
    public function favoritesUser(int $user_fk) {
        $manager = new FavoriteFindManager();
        $this->return("favoritesAccount", "Anim'Nord : Mes favoris", ['favoritesUserFind' => $manager->favoritesByUser($user_fk)]);
    }

    public function favorite($adFind_fk, $user_fk) {
        $manager = new FavoriteFindManager();
        $this->return("adFindCommentView", "Anim'Nord : Annonce", ['favoritesUserFind' => $manager->favorite($adFind_fk,$user_fk)]);
    }

    /**
     * Add a ad find in find favorite.
     * @param $favoriteFind
     */
    public function addFavorite($id, $user) {
        if ($_GET['id']) {
            $userManager = new UserManager();
            $adFindManager = new AdFindManager();
            $favoriteManager = new FavoriteFindManager();

            $user_fk = $userManager->getUser($user);
            $adLost_fk = $adFindManager->getAd($id);
            if($user_fk->getId()) {
                if ($adLost_fk->getId()) {
                    $favorite = new FavoriteFind(null, $adLost_fk, $user_fk);
                    $favoriteManager->add($favorite);
                }
            }
        }
        $this->return("adFindCommentView", "Anim'Nord : Annonce");
    }

    /**
     * Delete a favorite find using its id.
     * @param $favoriteLost
     */
    public function deleteFavorite($favoriteFind) {
        if (isset($favoriteFind['id'], $favoriteFind['adFind_fk'], $favoriteFind['user_fk'])) {
            $userManager = new UserManager();
            $adFindManager = new AdFindManager();
            $favoriteManager = new FavoriteFindManager();

            $id = intval($favoriteFind['id']);
            $adFind_fk = intval($favoriteFind['adFind_fk']);
            $user_fk = intval($favoriteFind['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $adFind_fk = $adFindManager->getAd($adFind_fk);
            if ($user_fk->getId()) {
                if ($adFind_fk->getId()) {
                    $favorite = new FavoriteFind($id);
                    $favoriteManager->delete($favorite);
                }
            }
        }
        $this->return("favoritesAccount", "Anim'Nord : Mes favoris");
    }
}