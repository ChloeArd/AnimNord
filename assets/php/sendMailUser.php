<?php

$id = $_POST['id'];

// Email a user about an ad.
if (isset($_POST["sender"], $_POST['recipient'], $_POST["message"], $_POST["subject"])){

    $to = trim($_POST['recipient']);
    $from = trim($_POST["sender"]);
    $subject = htmlentities(trim($_POST["subject"]));
    $message = htmlentities(trim($_POST["message"]));
    $headers = array(
        "Reply-To" => $from,
        "X-Mailer" => "PHP/" . phpversion()
    );

    if(filter_var($from, FILTER_VALIDATE_EMAIL)){
        mail($to, $subject, $message, $headers, "-f ".$from);
        header("Location: ../../index.php?controller=sendMail&id=$id&success=0");
    }
    else {
        header("Location: ../../index.php?controller=sendMail&id=$id&error=0");
    }
}
else {
    header("Location: ../../index.php?controller=sendMail&id=$id&error=1");
}
