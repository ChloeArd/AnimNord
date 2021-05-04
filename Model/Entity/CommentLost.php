<?php

namespace Model\Entity;

class CommentLost {

    private ?int $id;
    private ?string $content;
    private ?string $date;
    private ?int $adLost_fk;
    private ?int $user_fk;

    /**
     * CommentLost constructor.
     * @param int|null $id
     * @param string|null $content
     * @param string|null $date
     * @param int|null $adLost_fk
     * @param int|null $user_fk
     */
    public function __construct(?int $id = null, ?string $content = null, ?string $date = null, ?int $adLost_fk = null, ?int $user_fk = null) {
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
     * @return int|null
     */
    public function getAdLostFk(): ?int {
        return $this->adLost_fk;
    }

    /**
     * @param int|null $adLost_fk
     */
    public function setAdLostFk(?int $adLost_fk): void {
        $this->adLost_fk = $adLost_fk;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): void {
        $this->user_fk = $user_fk;
    }
}