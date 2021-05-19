<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\User;
use Model\Entity\Message;
use Model\User\UserManager;
use PDO;

class MessageManager {

    private UserManager $userManager;

    /**
     * UserManager constructor.
     */
    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return a list of messages between recipient and sender
     * @return array|null
     */
    public function getMessagesUser($recipient, $sender): array {
        $messages = [];
        // we retrieve the last 50 messages posted //ORDER BY id DESC LIMIT 0,50
        $request = DB::getInstance()->prepare("SELECT * FROM message WHERE recipient = :recipient, user_fk = :user_fk ORDER BY id DESC LIMIT 0,50");
        $request->bindParam(":recipient", $recipient);
        $request->bindParam(":user_fk", $sender);
        $request->execute();
        $messages_response = $request->fetchAll();

        if ($messages_response) {
            foreach ($messages_response as $data) {
                $sender = $this->userManager->getUser($data['user_fk']);
                $recipient = $this->userManager->getUser($data['recipient']);
                $messages[] = new Message($data['id'], $data['message'], $data['date'], $recipient, $sender);
            }
        }

        return $messages;
    }

    public function getMessages(int $id): array {
        $messages = [];
        // we retrieve the last 50 messages posted //ORDER BY id DESC LIMIT 0,50
        $request = DB::getInstance()->prepare("SELECT * FROM message WHERE user_fk = :user_fk LIMIT 0,50");
        $request->bindParam(":user_fk", $id);
        $request->execute();
        $messages_response = $request->fetchAll();

        if ($messages_response) {
            foreach ($messages_response as $data) {
                $messages[] = new Message($data['id'], $data['message'], $data['date'], $data['recipient'], $data['user_fk']);
            }
        }

        return $messages;
    }

    /**
     * Fetch provided Message ( id ).
     * @param int $id
     * @return Message
     */
    public function getMessage(int $id): Message {
        $request = DB::getInstance()->prepare("SELECT * FROM message WHERE id = :id");
        $request->bindValue(':id', $id);
        $request->execute();
        $message_data = $request->fetch();
        $message = new Message();
        if ($message_data) {
            $message->setId($message_data['id']);
            $message->setMessage($message_data['message']);
            $message->setDate($message_data['date']);
            $recipient = $this->userManager->getUser($message_data['recipient']);
            $message->setRecipient((int)$recipient);
            $sender = $this->userManager->getUser($message_data['user_fk']);
            $message->setUserFk((int)$sender);
        }
        return $message;
    }

    /**
     * Add a new message into the database.
     * @param $message
     * @param $date
     * @param $user
     * @return bool
     */
    public function addMessage(string $message, string $date, int $recipient, int $sender): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO message (message, date, recipient, user_fk)
              VALUES (:message, :date, :recipient, :user_fk)
        ");
        $request->bindParam(':message', $message);
        $request->bindParam(':date', $date);
        $request->bindParam(':recipient', $recipient, PDO::PARAM_INT);
        $request->bindParam(':user_fk', $sender, PDO::PARAM_INT);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !== 0;
    }
}