<?php
namespace Model\AdFind;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdFind;
use Model\User\UserManager;
use Model\Manager\Traits\ManagerTrait;

class AdFindManager {

    use ManagerTrait;

    private $userManager;

    /**
     * returns all find dog and cat ad
     * @return array
     */
    public function getAds(): array {
        $ads = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adfind ORDER by id DESC");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ads_data) {
                $user = UserManager::getManager()->getUser($ads_data['user_fk']);
                if($user->getId()) {
                    $ads[] = new AdFind($ads_data['id'], $ads_data['animal'], $ads_data['sex'], $ads_data['size'],
                        $ads_data['fur'], $ads_data['color'], $ads_data['dress'], $ads_data['race'], $ads_data['number'], $ads_data['description'],
                        $ads_data['date_find'], $ads_data['date'], $ads_data['city'], $ads_data['picture'] ,$user);
                }
            }
        }
        return $ads;
    }

    /**
     * Return a ad based on id.
     * @param $id
     * @return AdFind
     */
    public function getAd($id) {
        $request = DB::getInstance()->prepare("SELECT * FROM adfind WHERE id = $id");
        $request->execute();
        $ad_data = $request->fetch();
        $ad = new AdFind();
        if ($ad_data) {
            $ad->setId($ad_data['id']);
            $ad->setAnimal($ad_data['animal']);
            $ad->setSex($ad_data['sex']);
            $ad->setSize($ad_data['size']);
            $ad->setFur($ad_data['fur']);
            $ad->setColor($ad_data['color']);
            $ad->setDress($ad_data['dress']);
            $ad->setRace($ad_data['race']);
            $ad->setNumber($ad_data['number']);
            $ad->setDescription($ad_data['description']);
            $ad->setDateFind($ad_data['date_find']);
            $ad->setDate($ad_data['date']);
            $ad->setCity($ad_data['city']);
            $ad->setPicture($ad_data['picture']);
            $user = $this->userManager->getUser($ad_data['user_fk']);
            $ad->setUserFk($user);
        }
        return $ad;
    }

    public function getAd2(int $id): array {
        $ad = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adfind WHERE id = $id");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ad_data) {
                $user = UserManager::getManager()->getUser($ad_data['user_fk']);
                if($user->getId()) {
                    $ad[] = new AdFind($ad_data['id'], $ad_data['animal'], $ad_data['sex'], $ad_data['size'],
                        $ad_data['fur'], $ad_data['color'], $ad_data['dress'], $ad_data['race'], $ad_data['number'], $ad_data['description'],
                        $ad_data['date_find'], $ad_data['date'], $ad_data['city'], $ad_data['picture'] ,$user);
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
        $request = DB::getInstance()->prepare("SELECT * FROM adfind WHERE user_fk = $user_fk ORDER by id DESC ");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ads_data) {
                $user = UserManager::getManager()->getUser($user_fk);
                if($user->getId()) {
                    $ads[] = new AdFind($ads_data['id'], $ads_data['animal'], $ads_data['sex'], $ads_data['size'],
                        $ads_data['fur'], $ads_data['color'], $ads_data['dress'], $ads_data['race'], $ads_data['number'], $ads_data['description'],
                        $ads_data['date_find'], $ads_data['date'], $ads_data['city'], $ads_data['picture'] ,$user);
                }
            }
        }
        return $ads;
    }

    /**
     * add a find dogs and cats ad
     * @param AdFind $adFind
     * @return bool
     */
    public function add (AdFind $adFind): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO adfind (animal, sex, size, fur, color, dress, race, number, description, date_find, date, city, picture, user_fk)
                VALUES (:animal, :sex, :size, :fur, :color, :dress, :race, :number, :description, :date_find, :date, :city, :picture, :user_fk) 
        ");

        $request->bindValue(':animal', $adFind->getAnimal());
        $request->bindValue(':sex', $adFind->getSex());
        $request->bindValue(':size', $adFind->getSize());
        $request->bindValue(':fur', $adFind->getFur());
        $request->bindValue(':color', $adFind->getColor());
        $request->bindValue(':dress', $adFind->getDress());
        $request->bindValue(':race', $adFind->getRace());
        $request->bindValue(':number', $adFind->getNumber());
        $request->bindValue(':description', $adFind->getDescription());
        $request->bindValue(':date_find', $adFind->getDateFind());
        $request->bindValue(':date', $adFind->getDate());
        $request->bindValue(':city', $adFind->getCity());
        $request->bindValue(':picture', $adFind->getPicture());
        $request->bindValue(':user_fk', $adFind->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a add
     * @param AdFind $adFind
     * @return bool
     */
    public function update (AdFind $adFind): bool {
        $request = DB::getInstance()->prepare("UPDATE adfind SET animal = :animal, sex = :sex, size = :size, fur = :fur,
                  color = :color, dress = :dress, race = :race, number = :number, description = :description, date_find = :date_find,
                  date= :date, city = :city, picture = :picture WHERE id = :id");

        $request->bindValue(':id', $adFind->getId());
        $request->bindValue(':animal', $adFind->setAnimal($adFind->getAnimal()));
        $request->bindValue(':sex', $adFind->setSex($adFind->getSex()));
        $request->bindValue(':size', $adFind->setSize($adFind->getSize()));
        $request->bindValue(':fur', $adFind->setFur($adFind->getFur()));
        $request->bindValue(':color', $adFind->setColor($adFind->getColor()));
        $request->bindValue(':dress', $adFind->setDress($adFind->getDress()));
        $request->bindValue(':race', $adFind->setRace($adFind->getRace()));
        $request->bindValue(':number', $adFind->setNumber($adFind->getNumber()));
        $request->bindValue(':description', $adFind->setDescription($adFind->getDescription()));
        $request->bindValue(':date_find', $adFind->setDateFind($adFind->getDateFind()));
        $request->bindValue(':date', $adFind->setDate($adFind->getDate()));
        $request->bindValue(':city', $adFind->setCity($adFind->getCity()));
        $request->bindValue(':picture', $adFind->setPicture($adFind->getPicture()));

        return $request->execute();
    }

    /**
     * Delete a ad find
     * @param AdFind $adFind
     * @return bool
     */
    public function delete (AdFind $adFind): bool {
        $id = $adFind->getId();
        $request = DB::getInstance()->prepare("DELETE FROM adfind WHERE id = $id");
        return $request->execute();
    }

    public function filter($filterAd): array {
        $filter = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE animal = :animal, date_lost = :date_lost, sex = :sex, size = :size, fur = :fur,
                  color = :color, dress = :dress, race = :race, city = :city");

        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ads_data) {
                $user = UserManager::getManager()->getUser($ads_data['user_fk']);
                if($user->getId()) {
                    $filter[] = new AdFind($ads_data['id'], $ads_data['animal'], $ads_data['sex'], $ads_data['size'],
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
    public function recentAdFind(): array {
        $recent = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adfind ORDER by id DESC LIMIT 0,4");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ad) {
                $user = UserManager::getManager()->getUser($ad['user_fk']);
                if($user->getId()) {
                    $recent[] = new AdFind($ad['id'], $ad['animal'], $ad['sex'], $ad['size'],
                        $ad['fur'], $ad['color'], $ad['dress'], $ad['race'], $ad['number'], $ad['description'],
                        $ad['date_find'], $ad['date'], $ad['city'], $ad['picture'] ,$user);
                }
            }
        }
        return $recent;
    }

}