<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Message.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/MessageManager.php';

use Model\Entity\Message;
use Model\Manager\MessageManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new MessageManager();

switch($requestType) {
    case 'GET':
        if(isset($_GET['id']))
            echo getMessage($manager, intval($_GET['id']));
        else
            echo getMessagesUser($manager, $_GET['id'], $_SESSION['id']);
        break;
    case 'POST':
        $response = [
            'error' => 'success',
            'message' => 'Message envoyé avec succès',
        ];

        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->message, $data->date, $data->recipient, $data->user_fk)) {
            $recipient = intval($data->recipient);
            $user = intval($data->user);
            $result = $manager->addMessage($data->message, $data->date, $recipient, $user);
            if(!$result) {
                $response = [
                    'error' => 'danger',
                    'message' => 'Une erreur est survenue en envoyant le message',
                ];
            }
        }
        else {
            $response = [
                'error' => 'danger',
                'message' => 'Le message, la date ou l\'id du déstinataire ou de l\'expéditeur est manquant',
            ];
        }
        echo json_encode($response);
        break;
}

/**
 * Return the messages list.
 * @param MessageManager $manager
 * @return false|string
 */
function getMessagesUser(MessageManager $manager, $recipient, $sender): string {
    $response = [];
    $data = $manager->getMessagesUser($recipient, $sender);
    foreach($data as $message) {
        /* @var Message $message */
        $response[] = [
            'id' => $message->getId(),
            'message' => $message->getMessage(),
            'date' => $message->getDate(),
            'recipient' =>[
                'id' => $message->getRecipient()->getId(),
                'firstname' => $message->getRecipient()->getFirstname(),
                'lastname' => $message->getRecipient()->getLastname()
            ],
            'sender' => [
                'id' => $message->getUserFk()->getId(),
                'firstname' => $message->getUserFk()->getFirstname(),
                'lastname' => $message->getUserFk()->getLastname()
            ],
        ];
    }
    // Send the response (we encode our array in json format).
    return json_encode($response);
}

/**
 * Return only one message.
 * @param MessageManager $manager
 * @param int $id
 * @return string
 */
function getMessage(MessageManager $manager, int $id): string {
    $message = $manager->getMessage($id);
    $response[] = [
        'id' => $message->getId(),
        'message' => $message->getMessage(),
        'date' => $message->getDate(),
        'recipient' =>[
            'id' => $message->getRecipient()->getId(),
            'firstname' => $message->getRecipient()->getFirstname(),
            'lastname' => $message->getRecipient()->getLastname()
        ],
        'sender' => [
            'id' => $message->getUserFk()->getId(),
            'firstname' => $message->getUserFk()->getFirstname(),
            'lastname' => $message->getUserFk()->getLastname()
        ],
    ];
    return json_encode($response);
}

exit;