<?php

namespace Model\Entity;

class CommentLost {

    private ?int $id;
    private ?string $content;
    private ?string $date;
    private ?AdLost $adLost_fk;
    private ?User $user_fk;

    /**
     * CommentLost constructor.
     * @param int|null $id
     * @param string|null $content
     * @param string|null $date
     * @param AdLost|null $adLost_fk
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $content = null, ?string $date = null, ?AdLost $adLost_fk = null, ?User $user_fk = null) {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->adLost_fk = $adLost_fk;
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
     * @return AdLost|null
     */
    public function getAdLostFk(): ?AdLost {
        return $this->adLost_fk;
    }

    /**
     * @param AdLost|null $adLost_fk
     */
    public function setAdLostFk(?AdLost $adLost_fk): void {
        $this->adLost_fk = $adLost_fk;
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