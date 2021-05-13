<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdLost\AdLostManager;
use Model\User\UserManager;
use Model\Entity\CommentLost;
use Model\CommentLost\CommentLostManager;

class CommentLostController {

    use ReturnViewTrait;

    /**
     * display the list of comment
     * @param $adLost_fk
     */
    public function commentsAd(int $adLost_fk) {
        $manager = new CommentLostManager();
        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['comments' => $manager->getCommentsAd($adLost_fk)]);
    }

    /**
     * add a new comment
     * @param $fields
     */
    public function addComment($fields){
        if(isset($fields['content'], $fields['date'], $fields['adLost_fk'], $fields['user_fk'])) {
            $userManager = new UserManager();
            $adManager = new AdLostManager();
            $commentManager = new CommentLostManager();

            $content = htmlentities($fields['content']);
            $date = htmlentities($fields['date']);
            $adLost_fk = intval($fields['adLost_fk']);
            $user_fk = intval($fields['user_fk']);

            $adLost_fk = $adManager->getAd($adLost_fk);
            $user_fk = $userManager->getUser($user_fk);

            if ($adLost_fk->getId()) {
                if($user_fk->getId()) {
                    $comment = new CommentLost(null, $content, $date, $adLost_fk, $user_fk);
                    $commentManager->add($comment);
                    header("Location: ../index.php?controller=adlost&action=adComment&favorite=favoriteLost&id=" . $fields['adLost_fk'] . "&comment=commentLost&success=0");
                }
            }
        }
        $this->return('create/addCommentLostView', "Anim'Nord : Ajouter un commentaire");
    }

    /**
     * Update a comment
     * @param $fields
     */
    public function updateComment($fields) {
        if (isset($fields['id'], $fields['content'], $fields['adLost_fk'])) {
            $commentManager = new CommentLostManager();

            $id = intval($fields['id']);
            $content = htmlentities($fields['content']);

            $comment = new CommentLost($id, $content);
            $commentManager->update($comment);
            header("Location: ../index.php?controller=adlost&action=adComment&favorite=favoriteLost&id=" . $fields['adLost_fk'] . "&comment=commentLost&success=1");
        }
        $this->return('update/updateCommentLostView', "Anim'Nord : Modifier un commentaire");
    }

    /**
     * delete a comment
     * @param $fields
     */
    public function deleteComment($fields) {
        if (isset($fields['id'], $fields['adLost_fk'])) {
            $commentManager = new CommentLostManager();
            $id = intval($fields['id']);
            $commentManager->delete($id);
            header("Location: ../index.php?controller=adlost&action=adComment&favorite=favoriteLost&id=" . $fields['adLost_fk'] . "&comment=commentLost&success=2");
        }
        $this->return('delete/deleteCommentLostView', "Anim'Nord : Supprimer un commentaire");
    }
}