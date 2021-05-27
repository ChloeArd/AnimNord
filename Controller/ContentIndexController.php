<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\Entity\ContentIndex;
use Modele\ContentIndex\ContentIndexManager;
use Model\User\UserManager;

class ContentIndexController {

    use ReturnViewTrait;

    /**
     * Modifies the content of the home page
     * @param $contents
     */
    public function update($contents) {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role_fk'] !== "2") {
                if (isset($contents['id'], $contents['picture'], $contents['text1'], $contents['text2'], $contents['user_fk'])) {
                    $userManager = new UserManager();
                    $contentManager = new ContentIndexManager();

                    $id = intval($contents['id']);
                    $picture = htmlentities($contents['picture']);
                    $text1 = ucfirst($contents['text1']);
                    $text2 = ucfirst($contents['text2']);
                    $user_fk = intval($contents['user_fk']);

                    $user_fk = $userManager->getUser($user_fk);
                    if ($user_fk->getId()) {
                        $contents = new ContentIndex($id, $picture, $text1, $text2, $user_fk);
                        $contentManager->update($contents);
                        header("Location: ../index.php?&success=2");
                    }
                }
                $this->return("update/updateContentIndexView", "Anim'Nord : Modifier le contenu de l'accueil");
            }
        }
    }
}