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

}