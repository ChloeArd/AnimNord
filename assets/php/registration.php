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

    // I encrypt the password.
    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

    $requete = $bdd->prepare("SELECT * FROM user WHERE email = :email OR phone = :phone");
    $requete->bindParam(":email", $email);
    $requete->bindParam(":phone", $phone);
    $state = $requete->execute();

    if ($state) {
        $user = $requete->fetch();
        // Checks if email or phone is not in use.
        if ($user['email'] === $email ||  $user['phone'] === $phone) {
            header("Location: ../../index.php?controller=registration&error=0");
        }
        // Check if the email address is valid.
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $maj = preg_match('@[A-Z]@', $password);
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            // Checks if the password contains upper case, lower case, number and at least 8 characters.
            if($maj && $min && $number && strlen($password) >= 8) {
                $sql = $bdd->prepare("INSERT INTO user (firstname, lastname, email, phone, password, role_fk) 
                        VALUES (:firstname, :lastname, :email, :phone, :password, :role_fk)");

                $sql->bindValue(':firstname', $firstname);
                $sql->bindValue(':lastname', $lastname);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':phone', $phone);
                $sql->bindValue(':password', $encryptedPassword);
                // People who register automatically have role 2 : user.
                $sql->bindValue(':role_fk', 2);
                $sql->execute();

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