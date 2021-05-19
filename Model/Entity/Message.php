<?php

namespace Model\Entity;

class Message {

    private ?int $id;
    private ?string $message;
    private ?string $date;
    private ?int $recipient;
    private $user_fk;

    public function __construct(?int $id = null, ?string $message = null, ?string $date = null, ?int $recipient = null, ?int $user_fk = null) {
        $this->id = $id;
        $this->message = $message;
        $this->date = $date;
        $this->recipient = $recipient;
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
    public function setId(?int $id): ?int {
        $this->id = $id;
        return $id;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): ?string {
        $this->message = $message;
        return $message;
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
    public function setDate(?string $date): ?string {
        $this->date = $date;
        return $date;
    }

    /**
     * @return int|null
     */
    public function getRecipient(): ?int {
        return $this->recipient;
    }

    /**
     * @param int|null $recipient
     */
    public function setRecipient(?int $recipient): ?int {
        $this->recipient = $recipient;
        return $recipient;
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
    public function setUserFk(?int $user_fk): ?int {
        $this->user_fk = $user_fk;
        return $user_fk;
    }
}