<?php

// A user can send me an email.
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
        header('Location: ../../index.php?controller=contact&success=0');
    }
    else {
        header('Location: ../../index.php?controller=contact&error=0');
    }
}
else {
    header('Location: ../../index.php?controller=contact&error=1');
}
