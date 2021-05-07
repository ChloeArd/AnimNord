<?php
namespace Model\AdLost;

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
     * @param int $adLost_fk
     * @param int $user_fk
     * @return array
     */
    public function favoritesByUser(int $adLost_fk, int $user_fk): array {
        $favorites = [];
        $request = DB::getInstance()->prepare("SELECT * FROM favorite_lost WHERE user_fk = $user_fk ORDER by id DESC ");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $favorites_data) {
                $user = UserManager::getManager()->getUser($user_fk);
                $adLost = AdLostManager::getManager()->getAd($adLost_fk);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $favorites[] = new AdLost($favorites_data['id'], $adLost, $user);
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
    public function add (FavoriteLost$favorite): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO favorite_lost (adLost_fk, user_fk)
                VALUES (:adLost_fk, :user_fk) 
        ");

        $request->bindValue(':adLost_fk', $favorite->getAdLostFk()->getId());
        $request->bindValue(':user_fk', $favorite->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Delete a ad lost
     * @param FavoriteLost $favorite
     * @return bool
     */
    public function delete (FavoriteLost $favorite): bool {
        $id = $favorite->getId();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_lost WHERE id = $id");
        return $request->execute();
    }
}