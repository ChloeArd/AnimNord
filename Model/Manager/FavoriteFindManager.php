<?php
namespace Model\FavoriteFind;

use Model\DB;
use Model\Entity\FavoriteFind;
use Model\User\UserManager;
use Model\AdFind\AdFindManager;
use Model\Manager\Traits\ManagerTrait;

class FavoriteFindManager {

    use ManagerTrait;

    /**
     * Recover all the find dog and cat ads that the user has put in his favorites.
     * @param int $user_fk
     * @return array
     */
    public function favoritesByUser(int $user_fk): array {
        $favorites = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_find WHERE user_fk = :user_fk ORDER by id DESC ");
        $request->bindParam(":user_fk", $user_fk);
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $favorites_data) {
                $user = UserManager::getManager()->getUser($user_fk);
                $adLost = AdFindManager::getManager()->getAd($favorites_data['adFind_fk']);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $favorites[] = new FavoriteFind($favorites_data['id'], $adLost, $user);
                    }
                }
            }
        }
        return $favorites;
    }

    /**
     * See if the user has bookmarked the ad.
     * @param $adFind_fk
     * @param $user_fk
     * @return array
     */
    public function favorite($adFind_fk, $user_fk): array {
        $favorites = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_find WHERE user_fk = :user_fk AND adFind_fk = :adFind_fk ");
        $request->bindParam(":user_fk", $user_fk);
        $request->bindParam(":adFind_fk", $adFind_fk);
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $favorite) {
                $user = UserManager::getManager()->getUser($user_fk);
                $adLost = AdFindManager::getManager()->getAd($adFind_fk);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $favorites[] = new FavoriteFind($favorite['id'], $adLost, $user);
                    }
                }
            }
        }
        return $favorites;
    }

    /**
     * add an ad of find dogs and cats to favorites.
     * @param FavoriteFind $favorite
     * @return bool
     */
    public function add (FavoriteFind $favorite): bool {
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_find WHERE user_fk = :user_fk AND adFind_fk = :adFind_fk ");
        $request->bindValue(':adFind_fk', $favorite->getAdFindFk()->getId());
        $request->bindValue(':user_fk', $favorite->getUserFk()->getId());
        $request->execute();
        $favoriteFind = $request->fetch();
        // We check if the user has not already put the ad in his favorites.
        // If this is the case, we add the ad to our favorites.
        if ($favoriteFind['user_fk'] != $favorite->getUserFk()->getId() && $favoriteFind['adFind_fk'] != $favorite->getAdFindFk()->getId()) {
            $request = DB::getInstance()->prepare("INSERT INTO favorite_find (adFind_fk, user_fk) VALUES (:adFind_fk, :user_fk) ");
            $request->bindValue(':adFind_fk', $favorite->getAdFindFk()->getId());
            $request->bindValue(':user_fk', $favorite->getUserFk()->getId());
        }

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Delete a ad to favorites.
     * @param FavoriteFind $favorite
     * @return bool
     */
    public function delete (FavoriteFind $favorite): bool {
        $request = DB::getInstance()->prepare("DELETE FROM favorite_find WHERE id = :id");
        $request->bindValue(":id", $favorite->getId());
        return $request->execute();
    }
}