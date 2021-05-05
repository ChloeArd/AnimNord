<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Exception;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\Entity\User;
use Model\User\UserManager;

class AdLostController {

    use ReturnViewTrait;

    public function ads() {
        $manager = new AdLostManager();
        $adLost = $manager->getAds();

        $this->return("lostView", "Anim'Nord : Perdus", ['ads' => $adLost]);
    }
}