<?php

namespace Model\Entity;

class User {

    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?int $phone;
    private ?string $password;
    private ?int $role_fk;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $email
     * @param int|null $phone
     * @param string|null $password
     * @param int|null $role_fk
     */
    public function __construct(?int $id = null, ?string $firstname = null, ?string $lastname = null, ?string $email = null, ?int $phone = null, ?string $password = null, ?int $role_fk = null) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role_fk = $role_fk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int {
        return $this->phone;
    }

    /**
     * @param int|null $phone
     */
    public function setPhone(?int $phone): void {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void {
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getRoleFk(): ?int {
        return $this->role_fk;
    }

    /**
     * @param int|null $role_fk
     */
    public function setRoleFk(?int $role_fk): void {
        $this->role_fk = $role_fk;
    }


}