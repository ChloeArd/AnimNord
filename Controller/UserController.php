<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\DB;
use Model\Entity\User;
use Model\User\UserManager;
use Model\Entity\Role;
use Model\Role\RoleManager;

class UserController {

    use ReturnViewTrait;

    public function users() {
        $manager = new UserManager();
        $users = $manager->getUsers();

        $this->return("userManagementView", "Anim'Nord : Gestion des utilisateurs", ['users' => $users]);
    }

    public function user(int $id) {
        $manager = new UserManager();
        $user = $manager->getUserID($id);

        $this->return('informationAccount', "Anim'Nord : Informations", ['user' => $user]);
    }

    public function update($fields) {
        if (isset($fields['id'], $fields['firstname'], $fields['lastname'], $fields['email'], $fields['phone'])) {
            if (!empty($fields['firstname']) || $fields['lastname'] !== " " || $fields['email'] !== " " || $fields['phone'] !== " ") {
                $userManager = new UserManager();

                $id = intval($fields['id']);
                $firstname = htmlentities(ucfirst(trim($fields['firstname'])));
                $lastname = htmlentities(strtoupper(trim($fields['lastname'])));
                $email = htmlentities(trim($fields['email']));
                $phone = htmlentities(trim($fields['phone']));

                $user = new User($id, $firstname, $lastname, $email, $phone);
                $userManager->updateUser($user);
            }
        }
        $this->return('update/updatePersonalInfoUserView', "Anim'Nord : Modification des informations personnelles");
    }

    public function updatePass($fields) {
        if (isset($fields['id'], $fields['currentPassword'], $fields['newPassword'])) {
            $userManager = new UserManager();
            $bdd = DB::getInstance();

            $id = intval($fields['id']);
            $currentPassword = htmlentities(ucfirst(trim($fields['currentPassword'])));
            $newPassword = htmlentities(strtoupper(trim($fields['newPassword'])));

            $stmt = $bdd->prepare("SELECT * FROM user WHERE id = '$id'");
            $stmt->execute();

            foreach ($stmt->fetchAll() as $user) {
                if (password_verify($currentPassword, $user['password'])) {
                    $maj = preg_match('@[A-Z]@', $newPassword);
                    $min = preg_match('@[a-z]@', $newPassword);
                    $number = preg_match('@[0-9]@', $newPassword);

                    if($maj && $min && $number && strlen($newPassword) > 8) {
                        $password = password_hash($newPassword, PASSWORD_BCRYPT);
                        $user = new User($id, $password);
                        $userManager->updatePasswordUser($user);
                    }
                }
            }
        }
        $this->return('update/updatePassUserView', "Anim'Nord :  Changer de mot de passe");
    }

    public function delete(int $id) {
            $userManager = new UserManager();
            $id = intval($id);

            $userManager->deleteUser($id);

        $this->return("delete/deleteUserView", "Anim'Nord : Supprimer un utilisateur");
    }
}