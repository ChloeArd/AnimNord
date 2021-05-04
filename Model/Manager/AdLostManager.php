<?php
namespace Modele\ContentIndex;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdLost;
use Model\User\UserManager;
use Model\Manager\Traits\ManagerTrait;

class AdLostManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
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

}