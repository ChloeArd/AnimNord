<?php

namespace Controller\Traits;

use Exception;

trait ReturnViewTrait {

    public function return(string $view, string $title, array $var = null) {
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/$view.php";
        $html = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_Partials/structureView.php';
    }
}

function getRandomName(string $regularName) {
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15) ;
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . "." . $infos['extension'];
}