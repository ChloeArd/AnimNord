<?php
namespace Model\CommentFind;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdFind;
use Model\Entity\CommentFind;
use Model\User\UserManager;
use Model\AdFind\AdFindManager;
use Model\Manager\Traits\ManagerTrait;

class CommentFindManager {

    use ManagerTrait;

    /**
     * Show all comments for a single ad.
     * @param int $adFind_fk
     * @return array
     */
    public function getCommentsAd(int $adFind_fk): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_find WHERE adFind_fk = $adFind_fk ORDER BY id DESC");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $adFind = AdFindManager::getManager()->getAd($comment_data['adFind_fk']);
                if($user->getId()) {
                    if ($adFind->getId()) {
                        $comments[] = new CommentFind($comment_data['id'], $comment_data['content'], $comment_data['date'], $adFind, $user);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * Displays a comment based on its ID.
     * @param int $id
     * @return array
     */
    public function getCommentAd(int $id): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_find WHERE id = $id");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $adFind = AdFindManager::getManager()->getAd($comment_data['adFind_fk']);
                if($user->getId()) {
                    if ($adFind->getId()) {
                        $comments[] = new CommentFind($comment_data['id'], $comment_data['content'], $comment_data['date'], $adFind, $user);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * Add an comment into the database.
     * @param CommentFind $comment
     * @return bool
     */
    public function add(CommentFind $comment): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment_find (content, date, adFind_fk, user_fk)
            VALUES (:content, :date, :adFind_fk, :user_fk) 
        ");

        $request->bindValue(':content', $comment->getContent());
        $request->bindValue(':date', $comment->getDate());
        $request->bindValue(':adFind_fk', $comment->getAdFindFk()->getId());
        $request->bindValue(':user_fk', $comment->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a comment
     * @param CommentFind$comment
     * @return bool
     */
    public function update (CommentFind $comment): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_find SET content = :content WHERE id = :id");

        $request->bindValue(':id', $comment->getId());
        $request->bindValue(':content', $comment->setContent($comment->getContent()));

        return $request->execute();
    }

    /**
     * delete a comment
     * @param int $id
     * @return bool
     */
    public function delete (int $id): bool {
        $request = DB::getInstance()->prepare("DELETE FROM comment_find WHERE id = $id");
        return $request->execute();
    }
}