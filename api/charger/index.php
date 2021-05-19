<?php
use Model\DB;

require_once "../../assets/php/functions.php";
require_once "../../Model/DB.php";

if (!empty($_GET['id'])) { // We check that the id is present and not empty
    $bdd = DB::getInstance();

    $id = $_GET['id'];

    // We get the messages with an id greater than the one given
    $requete = $bdd->prepare("SELECT * FROM message WHERE id > :id ORDER BY id DESC");
    $requete->execute(array('id' => $id));

    $messages = null;

    // We write all the new messages in a variable
    while ($donnees = $requete->fetch()) {
        $idUser_fk = $donnees['user_fk'];
        //We retrieve the user who wrote the message thanks to the id user_fk store in message
        $requete2 = $bdd->prepare("SELECT * FROM user WHERE  id = :user_fk");
        $requete2->bindParam(':user_fk', $idUser_fk);
        $requete2->execute();

        foreach ($requete2->fetchAll() as $donnees2) {
            $messages .= "<div id='" . $donnees['id'] . "' class='flexColumn message'>
                <div class='flexRow width100'>
                       <p class='width_30 colorGrey bold'>" . $donnees2['firstname'] . "</p>
                       <p class='colorGrey'>" . $donnees['date'] . "</p>
                </div>
                <p class='text'>" . $donnees['message'] . "</p>
            </div>";
        }
        echo $messages; // We return the messages to our JS script
    }
}