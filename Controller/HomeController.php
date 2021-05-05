<?php
 namespace Controller;

 use Controller\Traits\ReturnViewTrait;

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

         $this->return("homeView", "Anim'Nord : Accueil", [
             "user" => $user,
         ]);
     }
 }