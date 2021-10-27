<?php
namespace Modele\ContentIndex;

use Model\DB;
use Model\Entity\User;
use Model\Entity\ContentIndex;
use Model\User\UserManager;
use Model\Manager\Traits\ManagerTrait;

class ContentIndexManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return all content on home page
     */
    public function getContents(): array {
        $contentIndex = [];
        $request = DB::getInstance()->prepare("SELECT * FROM content_index");
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if($user->getId()) {
                    $contentIndex[] = new ContentIndex($info['id'], $info['picture'],  $info['text1'], $info['text2'], $user);
                }
            }
        }
        return $contentIndex;
    }

    /**
     * return a content on home page
     * @param int $id
     * @return array
     */
    public function getContent(int $id): array {
        $contentIndex = [];
        $request = DB::getInstance()->prepare("SELECT * FROM content_index WHERE id = :id");
        $request->bindParam(":id", $id);
        if($request->execute()) {
            foreach ($request->fetchAll() as $info) {
                $user = UserManager::getManager()->getUser($info['user_fk']);
                if($user->getId()) {
                    $contentIndex[] = new ContentIndex($info['id'], $info['picture'],  $info['text1'], $info['text2'], $user);
                }
            }
        }
        return $contentIndex;
    }

    /**
     * we change the content of text1, text2 and the photo.
     * @param ContentIndex $contentIndex
     * @return bool
     */
    public function update (ContentIndex $contentIndex): bool {
        $request = DB::getInstance()->prepare("UPDATE content_index SET picture = :picture, text1 = :text1, text2 = :text2 WHERE id = :id");

        $request->bindValue(':id', $contentIndex->getId());
        $request->bindValue(':picture', $contentIndex->setPicture($contentIndex->getPicture()));
        $request->bindValue(':text1', $contentIndex->setText1($contentIndex->getText1()));
        $request->bindValue(':text2', $contentIndex->setText2($contentIndex->getText2()));
        return $request->execute();
    }
}