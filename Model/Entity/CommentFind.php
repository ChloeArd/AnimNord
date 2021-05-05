<?php

namespace Model\Entity;

class CommentFind {

    private ?int $id;
    private ?string $content;
    private ?string $date;
    private ?AdFind $adFind_fk;
    private ?User $user_fk;

    /**
     * CommentFind constructor.
     * @param int|null $id
     * @param string|null $content
     * @param string|null $date
     * @param AdFind|null $adFind_fk
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $content = null, ?string $date = null, ?AdFind $adFind_fk = null, ?User $user_fk = null) {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->adFind_fk = $adFind_fk;
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
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void {
        $this->date = $date;
    }

    /**
     * @return AdFind|null
     */
    public function getAdFindFk(): ?AdFind {
        return $this->adFind_fk;
    }

    /**
     * @param AdFind|null $adFind_fk
     */
    public function setAdFindFk(?AdFind $adFind_fk): void {
        $this->adFind_fk = $adFind_fk;
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
