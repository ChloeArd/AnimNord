<?php

namespace Controller;

use Controller\Traits\ReturnViewTrait;
use Model\DB;
use Model\Entity\User;
use Model\User\UserManager;

class UserController {

    use ReturnViewTrait;

    public function users() {
        $manager = new UserManager();
        $this->return("userManagementView", "Anim'Nord : Gestion des utilisateurs", ['users' => $manager->getUsers()]);
    }

    public function user(int $id) {
        $manager = new UserManager();
        $this->return('informationAccount', "Anim'Nord : Informations", ['user' => $manager->getUserID($id)]);
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

                header("Location: ../index.php?controller=user&action=view&id=" . $_SESSION['id'] . "&success=0");
            }
        }
        $this->return('update/updatePersonalInfoUserView', "Anim'Nord : Modification des informations personnelles");
    }

    public function updatePass($fields) {
        if (isset($fields['id'], $fields['currentPassword'], $fields['newPassword'])) {
            $userManager = new UserManager();

            $id = intval($fields['id']);
            $currentPassword = htmlentities($fields['currentPassword']);
            $newPassword = htmlentities($fields['newPassword']);

            if ($currentPassword === $_SESSION['password']) {
                $maj = preg_match('@[A-Z]@', $newPassword);
                $min = preg_match('@[a-z]@', $newPassword);
                $number = preg_match('@[0-9]@', $newPassword);

                if($maj && $min && $number && strlen($newPassword) > 8) {
                    $password = password_hash($newPassword, PASSWORD_BCRYPT);
                    $user = new User($id, $password);
                    $userManager->updatePasswordUser($user);
                    header("Location: ../index.php?controller=user&action=view&id=" . $_SESSION['id'] . "&success=1");
                }
            }
        }
        $this->return('update/updatePassUserView', "Anim'Nord :  Changer de mot de passe");
    }

    public function updateRole($fields) {
        if (isset($fields['id'], $fields['role_fk'])) {
            $userManager = new UserManager();

            $id = intval($fields['id']);
            $role_fk = intval($fields['role_fk']);

            $user = new User($id, $role_fk);
            $userManager->updateRoleUser($user);
            header("Location: ../index.php?controller=user&action=all&success=0");
        }
        $this->return('update/updateRoleUserView', "Anim'Nord : Modification des informations personnelles");
    }

    public function delete($user) {
        if (isset($user['id'])) {
            $userManager = new UserManager();

            $id = intval($user['id']);

            $userManager->deleteUser($id);
            header("Location: ../index.php?success=1");
        }
        $this->return("delete/deleteUserView", "Anim'Nord : Supprimer un utilisateur");
    }
}