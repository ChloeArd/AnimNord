<?php

use Model\DB;

include "functions.php";
require "../../Model/DB.php";

if (isset($_POST["email"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    // I get the name of the user
    $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt) {
        header("Location: ../../index.php?controller=connection&error=0");
    }

    $user = $stmt->fetch();
    // I check that the password encrypted on my database that I retrieved using the '$ user [' password ']' loop corresponds to the password entered by the user
    if (password_verify($password, $user['password'])) {
        // If the 2 password correspond then we open the session and we store the user's data in a session.
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['password'] = $password;
        $_SESSION['role_fk'] = $user['role_fk'];
        $id = $_SESSION['id'];
        header("Location: ../../index.php?controller=user&action=view&id=$id");
    }
    else {
        header("Location: ../../index.php?controller=connection&error=2");
    }
}
else {
    header("Location: ../../index.php?controller=connection&error=1");
}
