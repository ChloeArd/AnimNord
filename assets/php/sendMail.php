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
        header('Location: ../View/contact.php?success=0'); // send a success
    }
    elseif (!filter_var($from, FILTER_VALIDATE_EMAIL)){
        header('Location: ../View/contact.php?error=0'); // send a error
    }
}
else {
    header('Location: ../View/contact.php?error=1'); // send a error
}
