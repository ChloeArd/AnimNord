<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;

class MessageController {

    use ReturnViewTrait;

    // Page add ad
    public function messagePage() {
        if (isset($_SESSION["id"])) {
            $this->return("messageView", "Anim'Nord : Mes messages");
        }
    }
}