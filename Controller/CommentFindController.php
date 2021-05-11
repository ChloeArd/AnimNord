<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\Entity\AdFind;
use Model\AdFind\AdFindManager;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\CommentFind;
use Model\CommentFind\CommentFindManager;

class CommentFindController {

    use ReturnViewTrait;

    /**
     * display the list of comment
     * @param $adFind_fk
     * @return array
     */
    public function commentsAd(int $adFind_fk): array {
        $manager = new CommentFindManager();
        $comments = $manager->getCommentsAd($adFind_fk);

        $this->return("adFindCommentView", "Anim'Nord : Annonce", ['comments' => $comments]);
        return $comments;
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
                }
            }
        }
        $this->return('addCommentFindView', "Anim'Nord : Ajouter un commentaire");
    }

    /**
     * Update a comment
     * @param $fields
     */
    public function updateComment($fields) {
        if (isset($fields['id'], $fields['content'])) {
            $commentManager = new CommentFindManager();

            $id = intval($fields['id']);
            $content = htmlentities($fields['content']);

            $comment = new CommentFind($id, $content);
            $commentManager->update($comment);
        }

        $this->return('updateCommentFindView', "Anim'Nord : Modifier un commentaire");
    }

    /**
     * delete a comment
     * @param $fields
     */
    public function deleteComment($fields) {
        if (isset($fields['id'])) {
            $commentManager = new CommentFindManager();

            $id = intval($fields['id']);

            $commentManager->delete($id);
        }

        $this->return('deleteCommentFindView', "Anim'Nord : Supprimer un commentaire");
    }
}