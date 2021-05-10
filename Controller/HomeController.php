<?php
 namespace Controller;

 use Controller\Traits\ReturnViewTrait;
 use Model\AdFind\AdFindManager;
 use Model\AdLost\AdLostManager;
 use Modele\ContentIndex\ContentIndexManager;

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
         $manager = new ContentIndexManager();
         $content = $manager->getContents();

         $this->return("homeView", "Anim'Nord : Accueil", ["user" => $user, 'recentLost' => $adLost, 'recentFind' => $adFind, 'content' => $content]);
     }
 }