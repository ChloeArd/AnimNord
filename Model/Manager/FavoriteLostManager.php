<?php
namespace Model\FavoriteLost;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdLost;
use Model\Entity\FavoriteLost;
use Model\User\UserManager;
use Model\AdLost\AdLostManager;
use Model\Manager\Traits\ManagerTrait;

class FavoriteLostManager {

    use ManagerTrait;

    /**
     * Recover all the lost dog and cat ads that the user has put in his favorites.
     * @param int $user_fk
     * @return array
     */
    public function favoritesByUser(int $user_fk): array {
        $favorites = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_lost WHERE user_fk = :user_fk ORDER by id DESC ");
        $request->bindParam(":user_fk", $user_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($user_fk);
                $adLost = AdLostManager::getManager()->getAd($info['adLost_fk']);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $favorites[] = new FavoriteLost($info['id'], $adLost, $user);
                    }
                }
            }
        }
        return $favorites;
    }

    /**
     * See if the user has bookmarked the ad.
     * @param $adLost_fk
     * @param $user_fk
     * @return array
     */
    public function favorite($adLost_fk, $user_fk): array {
        $favorites = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_lost WHERE user_fk = :user_fk AND adLost_fk = :adLost_fk ");
        $request->bindParam(":user_fk", $user_fk);
        $request->bindParam(":adLost_fk", $adLost_fk);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($user_fk);
                $adLost = AdLostManager::getManager()->getAd($adLost_fk);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $favorites[] = new FavoriteLost($info['id'], $adLost, $user);
                    }
                }
            }
        }
        return $favorites;
    }

    /**
     * add an ad of lost dogs and cats to favorites.
     * @param FavoriteLost $favorite
     * @return bool
     */
    public function add (FavoriteLost $favorite): bool {
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_lost WHERE user_fk = :user_fk AND adLost_fk = :adLost_fk ");
        $request->bindValue(':adLost_fk', $favorite->getAdLostFk()->getId());
        $request->bindValue(':user_fk', $favorite->getUserFk()->getId());
        $request->execute();
        $favoriteLost = $request->fetch();
        // We check if the user has not already put the ad in his favorites.
        // If this is the case, we add the ad to our favorites.
        if ($favoriteLost['user_fk'] != $favorite->getUserFk()->getId() && $favoriteLost['adLost_fk'] != $favorite->getAdLostFk()->getId()) {
            $request = DB::getInstance()->prepare("INSERT INTO favorite_lost (adLost_fk, user_fk) VALUES (:adLost_fk, :user_fk) ");
            $request->bindValue(':adLost_fk', $favorite->getAdLostFk()->getId());
            $request->bindValue(':user_fk', $favorite->getUserFk()->getId());
        }
        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Delete a ad lost to favorites.
     * @param FavoriteLost $favorite
     * @return bool
     */
    public function delete (FavoriteLost $favorite): bool {
        $request = DB::getInstance()->prepare("DELETE FROM favorite_lost WHERE id = :id");
        $request->bindValue(":id", $favorite->getId());
        return $request->execute();
    }
}