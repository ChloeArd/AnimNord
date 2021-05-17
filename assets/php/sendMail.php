<?php

$to = "chloe.ardoise@gmail.com";
$from = trim($_POST["mail"]);
$subject = htmlentities(trim($_POST["subject"]));
$message = htmlentities(trim($_POST["message"]));
$headers = array(
    "Reply-To" => $from,
    "X-Mailer" => "PHP/" . phpversion()
);

if (isset($_POST["mail"], $_POST["message"], $_POST["subject"])){
    if(filter_var($from, FILTER_VALIDATE_EMAIL)){
        mail($to, $subject, $message, $headers, "-f ".$from);
        header('Location: ../index.php?controller=contact&success=0'); // send a success
    }
    else {
        header('Location: ../index.php?controller=contact&error=0'); // send a error
    }
}
else {
    header('Location: ../index.php?controller=contact&error=1'); // send a error
}
