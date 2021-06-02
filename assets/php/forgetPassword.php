<?php
session_start();
use Model\DB;

include "functions.php";
require "../../Model/DB.php";
$bdd = DB::getInstance();

if (isset($_POST["email"])) {
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // We check if the email address exists in database.
            $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $user = $stmt->fetch();
            if ($user['email'] == $email) {
                $fisrtname = $user['firstname'];
                $lastname = $user['lastname'];

                $_SESSION['email'] = $email;
                $code = "";
                for ($i = 0; $i < 8; $i++) {
                    $code .= mt_rand(0,9);
                }
                $stmt = $bdd->prepare("SELECT * FROM recovery WHERE email = :email");
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                $recovery = $stmt->fetch();
                if ($recovery['email'] == $email) {
                    $stmt = $bdd->prepare("UPDATE recovery SET code = :code WHERE email = :email");
                    $stmt->bindParam(":code", $code);
                    $stmt->bindParam(":email", $email);
                    $stmt->execute();
                }
                else {
                    $stmt = $bdd->prepare("INSERT INTO recovery (code, email) VALUES (:code, :email)");
                    $stmt->bindParam(":code", $code);
                    $stmt->bindParam(":email", $email);
                    $stmt->execute();
                }
                $to = $email;
                $from = "chloe.ardoise@gmail.com";
                $subject = "Récupération de mot de passe - Anim'Nord";
                $message = "
                    <div class='center'>Bonjour <span class='bold'>" . $fisrtname . " " . $lastname ."</span>,</div>
                     Voici votre code de récupération: <span>" . $code . "</span>
                     A bientôt sur <span class='bold'>Anim'Nord</span>!
                ";
                $headers = array(
                    "Reply-To" => $from,
                    "X-Mailer" => "PHP/" . phpversion()
                );
                mail($to, $subject, $message, $headers, "-f ".$from);
                header("Location: ../../index.php?controller=forgetPassword&page=code&success=0");
            }
            else {
                header("Location: ../../index.php?controller=forgetPassword&error=0");
            }
        }
        else {
            header("Location: ../../index.php?controller=forgetPassword&error=1");
        }
    }
    else {
        header("Location: ../../index.php?controller=forgetPassword&error=2");
    }
}

if (isset($_POST['code'])) {
    if (!empty($_POST['code'])) {
        $code = $_POST['code'];
        $stmt = $bdd->prepare("SELECT * From recovery WHERE email = :email AND code = :code");
        $stmt->bindParam(":email", $_SESSION['email']);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $recovery = $stmt->fetch();
        if ($recovery['email'] == $_SESSION['email'] && $recovery['code'] == $code) {
            $stmt = $bdd->prepare("UPDATE recovery SET confirm = 1 WHERE email = :email");
            $stmt->bindParam(":email", $_SESSION['email']);
            $stmt->execute();
            header("Location: ../../index.php?controller=forgetPassword&page=newPass&success=1");
        }
        else {
            header("Location: ../../index.php?controller=forgetPassword&page=code&error=3");
        }
    }
    else {
        header("Location: ../../index.php?controller=forgetPassword&page=code&error=4");
    }
}

if (isset($_POST['password'], $_POST['repeatPassword'])) {
    $stmt = $bdd->prepare("SELECT * FROM recovery WHERE email = :email");
    $stmt->bindParam(":email", $_SESSION['email']);
    $stmt->execute();
    $confirm = $stmt->fetch();
    $confirm = $confirm['confirm'];
    if ($confirm == 1) {
        $password = sanitize($_POST['password']);
        $repeatPassword = sanitize($_POST['repeatPassword']);
        if (!empty($password) && !empty($repeatPassword)) {
            $maj = preg_match('@[A-Z]@', $password);
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if($maj && $min && $number && strlen($password) > 8) {
                if ($password === $repeatPassword) {
                    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $bdd->prepare("UPDATE user SET password = :password WHERE email = :email");
                    $stmt->bindParam(':password', $encryptedPassword);
                    $stmt->bindParam(':email', $_SESSION['email']);
                    $stmt->execute();
                    $stmt = $bdd->prepare("DELETE FROM recovery WHERE email = :email");
                    $stmt->bindParam(":email", $_SESSION['email']);
                    $stmt->execute();
                    header("Location: ../../index.php?controller=connection&success=1");
                }
                else {
                    header("Location: ../../index.php?controller=forgetPassword&page=newPass&error=5");
                }
            }
            else {
                header("Location: ../../index.php?controller=forgetPassword&page=newPass&error=6");
            }
        }
        else {
            header("Location: ../../index.php?controller=forgetPassword&page=newPass&error=7");
        }
    }
    else {
        header("Location: ../../index.php?controller=forgetPassword&page=newPass&error=8");
    }
}