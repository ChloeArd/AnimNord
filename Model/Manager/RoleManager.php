<?php
 namespace Model\Role;

 use Model\DB;
 use Model\Entity\Role;
 use Model\Manager\Traits\ManagerTrait;

 class RoleManager {

     use ManagerTrait;

     /**
      * Return a role based on id.
      * @param int $id
      * @return Role
      */
     public function getRole(int $id): Role {
         $request = DB::getInstance()->prepare("SELECT * FROM role WHERE id = $id");
         $request->execute();
         $role_data = $request->fetch();
         $role = new Role();
         if ($role_data) {
             $role->setId($role_data['id']);
             $role->setRole($role_data['role']);
         }
         return $role;
     }

     /**
      * Return all roles
      * @return array
      */
     public function getRoles(): array {
         $roles = [];
         $request = DB::getInstance()->prepare("SELECT * FROM role");
         $request->execute();
         $roles_response = $request->fetchAll();
         if($roles_response) {
             foreach($roles_response as $db) {
                 $roles[] = new Role($db['id'], $db['role']);
             }
         }
         return $roles;
     }
 }