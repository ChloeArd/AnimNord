<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;

class MessageController {

    use ReturnViewTrait;

    // Page add ad
    public function messagePage() {
        $this->return("messageView", "Anim'Nord : Mes messages");
    }
}