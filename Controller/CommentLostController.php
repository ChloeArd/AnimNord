<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\Entity\AdLost;
use Model\AdLost\AdLostManager;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\CommentLost;
use Model\CommentLost\CommentLostManager;

class CommentLostController {

    use ReturnViewTrait;

    /**
     * display the list of comment
     * @param $adLost_fk
     * @return array
     */
    public function commentsAd(int $adLost_fk): array {
        $manager = new CommentLostManager();
        $comments = $manager->getCommentsAd($adLost_fk);

        $this->return("adLostCommentView", "Anim'Nord : Annonce", ['comments' => $comments]);
        return $comments;
    }


    /**
     * @param $id
     * @return array
     */
    public function commentAd($id): array {
        $manager = new CommentLostManager();
        $comment = $manager->getCommentAd($id);

        $this->return('updateCommentLostView', "Anim'Nord : Modification d'un commentaire", ['comment' => $comment]);
        return $comment;
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
                }
            }
        }
        $this->return('addCommentLostView', "Anim'Nord : Ajouter un commentaire");
    }

    /**
     * Update a comment
     * @param $fields
     */
    public function updateComment($fields) {
        if (isset($fields['id'], $fields['content'])) {
            $commentManager = new CommentLostManager();

            $id = intval($fields['id']);
            $content = htmlentities($fields['content']);

            $comment = new CommentLost($id, $content);
            $commentManager->update($comment);
        }

        $this->return('updateCommentLostView', "Anim'Nord : Modifier un commentaire");
    }

    /**
     * delete a comment
     * @param $fields
     */
    public function deleteComment($fields) {
        if (isset($fields['id'])) {
            $commentManager = new CommentLostManager();

            $id = intval($fields['id']);

            $commentManager->delete($id);
        }

        $this->return('deleteCommentLostView', "Anim'Nord : Supprimer un commentaire");
    }
}