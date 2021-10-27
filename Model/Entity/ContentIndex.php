<?php

namespace Model\Entity;

class ContentIndex {

    private ?int $id;
    private ?string $picture;
    private ?string $text1;
    private ?string $text2;
    private ?User $user_fk;

    /**
     * ContentIndex constructor.
     * @param int|null $id
     * @param string|null $picture
     * @param string|null $text1
     * @param string|null $text2
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $picture = null, ?string $text1 = null, ?string $text2 = null, ?User $user_fk = null) {
        $this->id = $id;
        $this->picture = $picture;
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->user_fk = $user_fk;
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
    public function getPicture(): ?string {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     */
    public function setPicture(?string $picture): string {
        $this->picture = $picture;
        return $picture;
    }

    /**
     * @return string|null
     */
    public function getText1(): ?string {
        return $this->text1;
    }

    /**
     * @param string|null $text1
     */
    public function setText1(?string $text1): string {
        $this->text1 = $text1;
        return $text1;
    }

    /**
     * @return string|null
     */
    public function getText2(): ?string {
        return $this->text2;
    }

    /**
     * @param string|null $text2
     */
    public function setText2(?string $text2): string {
        $this->text2 = $text2;
        return $text2;
    }

    /**
     * @return User|null
     */
    public function getUserFk(): ?User {
        return $this->user_fk;
    }

    /**
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): void {
        $this->user_fk = $user_fk;
    }
}