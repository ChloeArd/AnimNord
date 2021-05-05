<?php

use Model\DB;

include "functions.php";
require "../../Model/DB.php";

if (isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $firstname = sanitize($_POST["firstname"]);
    $lastname = sanitize($_POST['lastname']);
    $email = trim($_POST["email"]);
    $phone = sanitize($_POST['phone']);
    $password = sanitize($_POST["password"]);

    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

    $requete = $bdd->prepare("SELECT * FROM user WHERE email = '$email' OR phone = '$phone'");
    $state = $requete->execute();

    if ($state) {
        foreach ($requete->fetchAll() as $user) {
            $mailUse = $user['email'];
            $phoneUse = $user['phone'];

            if ($mailUse === $email || $phoneUse === $phone) {
                header("Location: ../../View/registration.php?error=0");
            }
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $maj = preg_match('@[A-Z]@', $password);
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if($maj && $min && $number && strlen($password) > 8) {
                // People who register automatically have role 2 : user.
                $sql = "INSERT INTO user VALUES (null, '$firstname', '$lastname', '$email', '$phone', '$encryptedPassword', 2)";
                $bdd->exec($sql);

                header("Location: ../../View/connect.php?success=0");
            }
            else {
                header("Location: ../../View/registration.php?error=1");
            }
        }
        else {
            header("Location: ../../View/registration.php?error=2");
        }
    }
}
else {
    header("Location: ../../View/registration.php?error=3");
}