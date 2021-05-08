<?php
namespace Model\CommentLost;

use Model\DB;
use Model\Entity\User;
use Model\Entity\AdLost;
use Model\Entity\CommentLost;
use Model\User\UserManager;
use Model\AdLost\AdLostManager;
use Model\Manager\Traits\ManagerTrait;

class CommentLostManager {

    use ManagerTrait;

    /**
     * Show all comments for a single ad.
     * @param int $id
     * @return array
     */
    public function getCommentsAd(int $adLost_fk): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment_lost WHERE adLost_fk = $adLost_fk ORDER BY id DESC");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $adLost = AdLostManager::getManager()->getAd($comment_data['adLost_fk']);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $comments[] = new CommentLost($comment_data['id'], $comment_data['content'], $comment_data['date'], $adLost, $user);
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
        $request = DB::getInstance()->prepare("SELECT * FROM comment_lost WHERE id = $id");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $adLost = AdLostManager::getManager()->getAd($comment_data['article_fk']);
                if($user->getId()) {
                    if ($adLost->getId()) {
                        $comments[] = new CommentLost($comment_data['id'], $comment_data['content'], $comment_data['date'], $adLost, $user);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * Add an comment into the database.
     * @param CommentLost $comment
     * @return bool
     */
    public function add(CommentLost $comment): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment_lost VALUES (:content, :date, :adLost_fk, :user_fk) 
        ");

        $request->bindValue(':content', $comment->getContent());
        $request->bindValue(':date', $comment->getDate());
        $request->bindValue(':adLost_fk', $comment->getAdLostFk()->getId());
        $request->bindValue(':user_fk', $comment->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * update a comment
     * @param CommentLost $comment
     * @return bool
     */
    public function update (CommentLost $comment): bool {
        $request = DB::getInstance()->prepare("UPDATE comment_lost SET content = :content, date = :date WHERE id = :id");

        $request->bindValue(':id', $comment->getId());
        $request->bindValue(':content', $comment->setContent($comment->getContent()));
        $request->bindValue(':date', $comment->getDate());

        return $request->execute();
    }

    /**
     * delete a comment
     * @param CommentLost $comment
     * @return bool
     */
    public function delete (CommentLost $comment): bool {
        $id = $comment->getId();
        $request = DB::getInstance()->prepare("DELETE FROM comment_lost WHERE id = $id");
        return $request->execute();
    }
}