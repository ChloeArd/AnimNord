<?php

namespace Model\Entity;

class FavoriteLost {

    private ?int $id;
    private ?int $adLost_fk;
    private ?int $user_fk;

    /**
     * FavoriteLost constructor.
     * @param int|null $id
     * @param int|null $adLost_fk
     * @param int|null $user_fk
     */
    public function __construct(?int $id = null, ?int $adLost_fk = null, ?int $user_fk = null) {
        $this->id = $id;
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