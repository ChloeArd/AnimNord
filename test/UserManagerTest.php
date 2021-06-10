<?php

use Model\Entity\User;
use Model\User\UserManager;
use PHPUnit\Framework\TestCase;
require_once "Model/Entity/User.php";
require_once "Model/DB.php";
require_once "Model/Manager/RoleManager.php";
require_once "Model/Entity/Role.php";
require dirname(__FILE__). "/../Model/Manager/UserManager.php";

class UserManagerTest extends TestCase {

    private UserManager $objet;

    public function __construct(?string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->objet = new UserManager();
    }

    // Testing getUser.
    public function testGetUser() {
        $result = $this->objet->getUser(1);
        $this->assertSame(htmlentities(ucfirst("Chloé")), $result->getFirstname());
    }

    // Testing update.
    public function testUpdate() {
        $user = new User(1);
        $user->setFirstname(htmlentities(ucfirst("Chlochlo")));
        $user->setLastname(htmlentities(strtoupper("ARD")));
        $user->setEmail("chloe.ardoise@gmail.com");
        $user->setPhone("0765897856");
        $result = $this->objet->updateUser($user);
        $this->assertNotNull($result);
    }
}