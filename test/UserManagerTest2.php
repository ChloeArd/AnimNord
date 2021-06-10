<?php

use Model\User\UserManager;
use PHPUnit\Framework\TestCase;

require_once "../Model/Manager/RoleManager.php";
require_once "../Model/Manager/Traits/ManagerTrait.php";
require dirname(__FILE__). "/../Model/Manager/UserManager.php";

class UserManagerTest2 extends TestCase {

    public function testUser() {
        $db = new \Model\DB();
        $user = new \Model\Entity\User();
        $user->setLastname('test');
        $user->setFirstname('test');
        $db->insert($user);
        $this->assertNotNull($user->getId());
    }

    // I check if the first name that I add corresponds to the user that I retrieved by an ID in the database.
    /*public function testGetUserID() {
        $bdd = DB::getInstance();
        $request = $bdd->prepare("SELECT * from user WHERE id = :id");
        $request->bindValue(":id", 1);
        if($request->execute()) {
            foreach($request->fetchAll() as $info) {
                $role = RoleManager::getManager()->getRole($info['role_fk']);
                if ($role->getId()) {
                    $user[] = new User($info['id'], $info['firstname'], $info['lastname'] ,$info['email'], $info['phone'],'', $role);
                    // Checks if the two values entered in the parameters are of the same type and have the same value.
                    $this->assertSame(htmlentities("Chloé"), $info['firstname']);
                }
            }
        }*/
}
