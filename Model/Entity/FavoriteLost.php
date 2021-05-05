<?php

namespace Model\Entity;

class FavoriteLost {

    private ?int $id;
    private ?AdLost $adLost_fk;
    private ?User $user_fk;

    /**
     * FavoriteLost constructor.
     * @param int|null $id
     * @param AdLost|null $adLost_fk
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?AdLost $adLost_fk = null, ?User $user_fk = null) {
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