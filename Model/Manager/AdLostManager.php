<?php
namespace Model\AdLost;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdLost;
use Model\User\UserManager;
use Model\Manager\Traits\ManagerTrait;

class AdLostManager {

    use ManagerTrait;

    private $userManager;

    /**
     * returns all lost dog and cat ad
     * @return array
     */
    public function getAds(): array {
        $ads = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost ORDER by id DESC");
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $ads_data) {
                $user = UserManager::getManager()->getUser($ads_data['user_fk']);
                if($user->getId()) {
                    $ads[] = new AdLost($ads_data['id'], $ads_data['animal'],  $ads_data['name'], $ads_data['sex'], $ads_data['size'],
                        $ads_data['fur'], $ads_data['color'], $ads_data['dress'], $ads_data['race'], $ads_data['number'], $ads_data['description'],
                        $ads_data['date_lost'], $ads_data['date'], $ads_data['city'], $ads_data['picture'] ,$user);
                }
            }
        }
        return $ads;
    }

    /**
     * Return a ad based on id.
     * @param $id
     * @return AdLost
     */
    public function getAd($id) {
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE id = :id");
        $request->bindParam(":id", $id);
        $request->execute();
        $ad_data = $request->fetch();
        $ad = new AdLost();
        if ($ad_data) {
            $ad->setId($ad_data['id']);
            $ad->setAnimal($ad_data['animal']);
            $ad->setName($ad_data['name']);
            $ad->setSex($ad_data['sex']);
            $ad->setSize($ad_data['size']);
            $ad->setFur($ad_data['fur']);
            $ad->setColor($ad_data['color']);
            $ad->setDress($ad_data['dress']);
            $ad->setRace($ad_data['race']);
            $ad->setNumber($ad_data['number']);
            $ad->setDescription($ad_data['description']);
            $ad->setDateLost($ad_data['date_lost']);
            $ad->setDate($ad_data['date']);
            $ad->setCity($ad_data['city']);
            $ad->setPicture($ad_data['picture']);
        }
        return $ad;
    }

    public function getAd2(int $id): array {
        $ad = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE id = :id");
        $request->bindParam(":id", $id);
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $data) {
                $user = UserManager::getManager()->getUser($data['user_fk']);
                if ($user->getId()) {
                    $ad[] = new AdLost($data['id'], $data['animal'], $data['name'], $data['sex'], $data['size'],
                        $data['fur'], $data['color'], $data['dress'], $data['race'], $data['number'], $data['description'],
                        $data['date_lost'], $data['date'], $data['city'], $data['picture'], $user);
                }
            }
        }
        return $ad;
    }

    /**
     * @param int $user_fk
     * @return array
     */
    public function adsByUser(int $user_fk): array {
        $ads = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE user_fk = :user_fk ORDER by id DESC ");
        $request->bindParam(":user_fk", $user_fk);
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $ads_data) {
                $user = UserManager::getManager()->getUser($user_fk);
                if($user->getId()) {
                    $ads[] = new AdLost($ads_data['id'], $ads_data['animal'],  $ads_data['name'], $ads_data['sex'], $ads_data['size'],
                        $ads_data['fur'], $ads_data['color'], $ads_data['dress'], $ads_data['race'], $ads_data['number'], $ads_data['description'],
                        $ads_data['date_lost'], $ads_data['date'], $ads_data['city'], $ads_data['picture'] ,$user);
                }
            }
        }
        return $ads;
    }

    /**
     * add a lost dogs and cats ad
     * @param AdLost $adLost
     * @return bool
     */
    public function add (AdLost $adLost): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO adlost (animal, name, sex, size, fur, color, dress, race, number, description, date_lost, date, city, picture, user_fk)
                VALUES (:animal, :name, :sex, :size, :fur, :color, :dress, :race, :number, :description, :date_lost, :date, :city, :picture, :user_fk) 
        ");

        $request->bindValue(':animal', $adLost->getAnimal());
        $request->bindValue(':name', $adLost->getName());
        $request->bindValue(':sex', $adLost->getSex());
        $request->bindValue(':size', $adLost->getSize());
        $request->bindValue(':fur', $adLost->getFur());
        $request->bindValue(':color', $adLost->getColor());
        $request->bindValue(':dress', $adLost->getDress());
        $request->bindValue(':race', $adLost->getRace());
        $request->bindValue(':number', $adLost->getNumber());
        $request->bindValue(':description', $adLost->getDescription());
        $request->bindValue(':date_lost', $adLost->getDateLost());
        $request->bindValue(':date', $adLost->getDate());
        $request->bindValue(':city', $adLost->getCity());
        $request->bindValue(':picture', $adLost->getPicture());
        $request->bindValue(':user_fk', $adLost->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * @param AdLost $adLost
     * @return bool
     */
    public function update (AdLost $adLost): bool {
        $request = DB::getInstance()->prepare("UPDATE adlost SET animal = :animal, name = :name, sex = :sex, size = :size, fur = :fur,
                  color = :color, dress = :dress, race = :race, number = :number, description = :description, date_lost = :date_lost,
                  date= :date, city = :city, picture = :picture WHERE id = :id");

        $request->bindValue(':id', $adLost->getId());
        $request->bindValue(':animal', $adLost->setAnimal($adLost->getAnimal()));
        $request->bindValue(':name', $adLost->setName($adLost->getName()));
        $request->bindValue(':sex', $adLost->setSex($adLost->getSex()));
        $request->bindValue(':size', $adLost->setSize($adLost->getSize()));
        $request->bindValue(':fur', $adLost->setFur($adLost->getFur()));
        $request->bindValue(':color', $adLost->setColor($adLost->getColor()));
        $request->bindValue(':dress', $adLost->setDress($adLost->getDress()));
        $request->bindValue(':race', $adLost->setRace($adLost->getRace()));
        $request->bindValue(':number', $adLost->setNumber($adLost->getNumber()));
        $request->bindValue(':description', $adLost->setDescription($adLost->getDescription()));
        $request->bindValue(':date_lost', $adLost->setDateLost($adLost->getDateLost()));
        $request->bindValue(':date', $adLost->setDate($adLost->getDate()));
        $request->bindValue(':city', $adLost->setCity($adLost->getCity()));
        $request->bindValue(':picture', $adLost->setPicture($adLost->getPicture()));

        return $request->execute();
    }

    /**
     * Delete a ad lost
     * @param AdLost $adLost
     * @return bool
     */
    public function delete (AdLost $adLost): bool {
        $request = DB::getInstance()->prepare("DELETE FROM adlost WHERE id = :id");
        $request->bindValue(":id", $adLost->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM comment_lost WHERE adLost_fk = :adLost_fk");
        $request->bindValue(":adLost_fk", $adLost->getId());
        $request->execute();
        $request = DB::getInstance()->prepare("DELETE FROM favorite_lost WHERE adLost_fk = :adLost_fk");
        $request->bindValue(":adLost_fk", $adLost->getId());
        return $request->execute();
    }

    public function filter($filterAd): array {
        $filter = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE animal = :animal, date_lost = :date_lost, sex = :sex, size = :size, fur = :fur,
                  color = :color, dress = :dress, race = :race, city = :city");

        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $ads_data) {
                $user = UserManager::getManager()->getUser($ads_data['user_fk']);
                if($user->getId()) {
                    $filter[] = new AdLost($ads_data['id'], $ads_data['animal'],  $ads_data['name'], $ads_data['sex'], $ads_data['size'],
                        $ads_data['fur'], $ads_data['color'], $ads_data['dress'], $ads_data['race'], $ads_data['number'], $ads_data['description'],
                        $ads_data['date_lost'], $ads_data['date'], $ads_data['city'], $ads_data['picture'] ,$user);
                }
            }
        }
        return $filter;
    }

    /**
     * I retrieve the last 4 IDs, to have 4 recent announcements.
     * @return array
     */
    public function recentAdLost(): array {
        $recent = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost ORDER by id DESC LIMIT 0,4");
        $result = $request->execute();
        if($result) {
            foreach ($request->fetchAll() as $ad) {
                $user = UserManager::getManager()->getUser($ad['user_fk']);
                if($user->getId()) {
                    $recent[] = new AdLost($ad['id'], $ad['animal'],  $ad['name'], $ad['sex'], $ad['size'],
                        $ad['fur'], $ad['color'], $ad['dress'], $ad['race'], $ad['number'], $ad['description'],
                        $ad['date_lost'], $ad['date'], $ad['city'], $ad['picture'] ,$user);
                }
            }
        }
        return $recent;
    }

}