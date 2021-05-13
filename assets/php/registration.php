<?php

use Model\DB;

include "functions.php";
require "../../Model/DB.php";

if (isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $firstname = sanitize(ucfirst($_POST["firstname"]));
    $lastname = sanitize(strtoupper($_POST['lastname']));
    $email = trim($_POST["email"]);
    $phone = sanitize($_POST['phone']);
    $password = sanitize($_POST["password"]);

    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

    $requete = $bdd->prepare("SELECT * FROM user WHERE email = :email OR phone = :phone");
    $requete->bindParam(":email", $email);
    $requete->bindParam(":phone", $phone);
    $state = $requete->execute();

    if ($state) {
        $user = $requete->fetch();
        if ($user['email'] === $email ||  $user['phone'] === $phone) {
            header("Location: ../../index.php?controller=registration&error=0");
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $maj = preg_match('@[A-Z]@', $password);
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if($maj && $min && $number && strlen($password) > 8) {
                // People who register automatically have role 2 : user.
                $sql = "INSERT INTO user VALUES (null, '$firstname', '$lastname', '$email', '$phone', '$encryptedPassword', 2)";
                $bdd->exec($sql);

                header("Location: ../../index.php?controller=connection&success=0");
            }
            else {
                header("Location: ../../index.php?controller=registration&error=1");
            }
        }
        else {
            header("Location: ../../index.php?controller=registration&error=2");
        }
    }
}
else {
    header("Location: ../../index.php?controller=registration&error=3");
}