<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';


use Model\Entity\User;
use Model\User\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new UserManager();

switch ($requestType) {
    case 'GET':
        echo getUsers($manager);
        break;
    default:
        break;
}

/**
 * Return the schools list.
 * @param UserManager $manager
 * @return false|string
 */
function getUsers(UserManager $manager): string {
    $response = [];
    $data = $manager->getUsers();
    foreach ($data as $user) {
        $response[] = [
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'password' =>$user->getPassword(),
        ];
    }
    return json_encode($response);
}
