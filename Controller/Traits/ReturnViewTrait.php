<?php

namespace Controller\Traits;

trait ReturnViewTrait {

    public function return(string $view, string $title, array $var = null) {
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/$view.php";
        $html = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_Partials/structureView.php';
    }
}
