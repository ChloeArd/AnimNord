<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Exception;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\Role;
use Model\Role\RoleManager;

class UserController {

    use ReturnViewTrait;

    public function users() {
        $manager = new UserManager();
        $users = $manager->getUsers();

        $this->return("", "Anim'Nord : Gestion des utilisateurs", ['users' => $users]);
    }

    public function user(int $id): User {
        $manager = new UserManager();
        $user = $manager->getUser($id);

        $this->return('informationAccount', "Anim'Nord : Informations", [
            'user' => $user,
        ]);
        return $user;
    }
}