<?php
 namespace Controller;

 use Controller\Traits\ReturnViewTrait;
 use Model\AdFind\AdFindManager;
 use Model\AdLost\AdLostManager;

 class HomeController {

     use ReturnViewTrait;

     /**
      * display the home page
      */
     public function homePage() {
         $user = "Anonyme";
         if(isset($_SESSION["user"])) {
             $user = $_SESSION["user"];
         }

         $manager = new AdLostManager();
         $adLost = $manager->recentAdLost();
         $manager = new AdFindManager();
         $adFind = $manager->recentAdFind();

         $this->return("homeView", "Anim'Nord : Accueil", ["user" => $user, 'recentLost' => $adLost, 'recentFind' => $adFind]);
     }
 }