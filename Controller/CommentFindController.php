<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\AdFind\AdFindManager;
use Model\User\UserManager;
use Model\Entity\CommentFind;
use Model\CommentFind\CommentFindManager;

class CommentFindController {

    use ReturnViewTrait;

    /**
     * display the list of comment
     * @param $adFind_fk
     */
    public function commentsAd(int $adFind_fk) {
        $manager = new CommentFindManager();
        $this->return("adFindCommentView", "Anim'Nord : Annonce", ['comments' => $manager->getCommentsAd($adFind_fk)]);
    }

    /**
     * add a new comment
     * @param $fields
     */
    public function addComment($fields){
        if(isset($fields['content'], $fields['date'], $fields['adFind_fk'], $fields['user_fk'])) {
            $userManager = new UserManager();
            $adManager = new AdFindManager();
            $commentManager = new CommentFindManager();

            $content = htmlentities($fields['content']);
            $date = htmlentities($fields['date']);
            $adFind_fk = intval($fields['adFind_fk']);
            $user_fk = intval($fields['user_fk']);

            $adFind_fk = $adManager->getAd($adFind_fk);
            $user_fk = $userManager->getUser($user_fk);

            if ($adFind_fk->getId()) {
                if($user_fk->getId()) {
                    $comment = new CommentFind(null, $content, $date, $adFind_fk, $user_fk);
                    $commentManager->add($comment);
                    header("Location: ../index.php?controller=adfind&action=adComment&id=" . $fields['adFind_fk'] . "&success=0");
                }
            }
        }
        $this->return('create/addCommentFindView', "Anim'Nord : Ajouter un commentaire");
    }

    /**
     * Update a comment
     * @param $fields
     */
    public function updateComment($fields) {
        if (isset($fields['id'], $fields['content'], $fields['adFind_fk'])) {
            $commentManager = new CommentFindManager();

            $id = intval($fields['id']);
            $content = htmlentities($fields['content']);

            $comment = new CommentFind($id, $content);
            $commentManager->update($comment);
            header("Location: ../index.php?controller=adfind&action=adComment&id=" . $fields['adFind_fk'] . "&success=1");
        }

        $this->return('update/updateCommentFindView', "Anim'Nord : Modifier un commentaire");
    }

    /**
     * delete a comment
     * @param $fields
     */
    public function deleteComment($fields) {
        if (isset($fields['id'], $fields['adFind_fk'])) {
            $commentManager = new CommentFindManager();
            $id = intval($fields['id']);
            $commentManager->delete($id);
            header("Location: ../index.php?controller=adfind&action=adComment&id=" . $fields['adFind_fk'] . "&success=2");
        }
        $this->return('delete/deleteCommentFindView', "Anim'Nord : Supprimer un commentaire");
    }
}