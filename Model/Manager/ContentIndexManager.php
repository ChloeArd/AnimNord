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
     * Return all content on index.php
     */
    public function getContents(): array {
        $contentIndex = [];
        $request = DB::getInstance()->prepare("SELECT * FROM content_index");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $contentIndex_data) {
                $user = UserManager::getManager()->getUser($contentIndex_data['user_fk']);
                if($user->getId()) {
                    $contentIndex[] = new ContentIndex($contentIndex_data['id'], $contentIndex_data['picture'],  $contentIndex_data['text1'], $contentIndex_data['text2'], (int) $user);
                }
            }
        }
        return $contentIndex;
    }

    /**
     * Return a content on index.php based on id.
     * @param $id
     * @return ContentIndex
     */
    public function getContent($id) {
        $request = DB::getInstance()->prepare("SELECT * FROM content_index WHERE id = $id");
        $request->execute();
        $content_data = $request->fetch();
        $content = new ContentIndex();
        if ($content_data) {
            $content->setId($content_data['id']);
            $content->setPicture($content_data['picture']);
            $content->setText1($content_data['text1']);
            $content->setText2($content_data['text2']);
            $user = $this->userManager->getUser($content_data['user_fk']);
            $content->setUserFk((int)$user);
        }
        return $content;
    }

    /**
     * we change the content of text1 and the photo. Also the user to show who modified.
     * @param ContentIndex $contentIndex
     * @return bool
     */
    public function updateText1 (ContentIndex $contentIndex): bool {
        $request = DB::getInstance()->prepare("UPDATE content_index SET picture = :picture, text1 = :text1, user_fk = :user_fk WHERE id = :id");

        $request->bindValue(':id', $contentIndex->getId());
        $request->bindValue(':picture', $contentIndex->setPicture($contentIndex->getPicture()));
        $request->bindValue(':title', $contentIndex->setText1($contentIndex->getText1()));
        $request->bindValue(':user_fk', $contentIndex->setUserFk($contentIndex->getUserFk()));
        return $request->execute();
    }

    /**
     * we change the content of text2. Also the user to show who modified.
     * @param ContentIndex $contentIndex
     * @return bool
     */
    public function updateText2 (ContentIndex $contentIndex): bool {
        $request = DB::getInstance()->prepare("UPDATE content_index SET text2 = :text2, user_fk = :user_fk WHERE id = :id");

        $request->bindValue(':id', $contentIndex->getId());
        $request->bindValue(':title', $contentIndex->setText2($contentIndex->getText2()));
        $request->bindValue(':user_fk', $contentIndex->setUserFk($contentIndex->getUserFk()));
        return $request->execute();
    }

    /**
     * Delete content on index.php
     * @param ContentIndex $contentIndex
     * @return bool
     */
    public function delete (ContentIndex $contentIndex) {
        $id = $contentIndex->getId();
        $request = DB::getInstance()->prepare("DELETE FROM content_index WHERE id = $id");
        return $request->execute();
    }
}