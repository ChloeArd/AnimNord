<?php
namespace Model\AdLost;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdLost;
use Model\User\UserManager;
use Model\Manager\Traits\ManagerTrait;

class AdLostManager {

    use ManagerTrait;

    /**
     * returns all lost dog and cat ad
     * @return array
     */
    public function getAds(): array {
        $ads = [];
        $request = DB::getInstance()->prepare("SELECT * FROM adlost");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $ads_data) {
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
        $request = DB::getInstance()->prepare("SELECT * FROM adlost WHERE id = $id");
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
            $user = $this->userManager->getUser($ad_data['user_fk']);
            $ad->setUserFk($user);
        }
        return $ad;
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
        $request->bindValue(':user_fk', $adLost->getUserFk());

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
    public function delete (AdLost $adLost) {
        $id = $adLost->getId();
        $request = DB::getInstance()->prepare("DELETE FROM adlost WHERE id = $id");
        return $request->execute();
    }

    public function filter() {

    }

}