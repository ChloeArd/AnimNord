<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Exception;
use http\Url;
use Model\Entity\ContentIndex;
use Modele\ContentIndex\ContentIndexManager;
use Model\Entity\User;
use Model\User\UserManager;

class ContentIndexController {

    use ReturnViewTrait;

    public function update($contents) {
        if (isset($contents['id'], $contents['picture'], $contents['text1'], $contents['text2'], $contents['user_fk'])) {
            $userManager = new UserManager();
            $contentManager = new ContentIndexManager();

            $id = intval($contents['id']);
            $picture = htmlentities($contents['picture']);
            $text1 = ucfirst($contents['text1']);
            $text2 = ucfirst($contents['text2']);
            $user_fk = intval($contents['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $contents = new ContentIndex($id, $picture, $text1, $text2, $user_fk);
                $contentManager->update($contents);
            }
        }
        $this->return("updateContentIndexView", "Anim'Nord : Modifier le contenu de l'accueil");
    }
}