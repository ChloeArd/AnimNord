<?php

namespace Model\Entity;

class FavoriteFind {

    private ?int $id;
    private ?AdFind $adFind_fk;
    private ?User $user_fk;

    /**
     * FavoriteFind constructor.
     * @param int|null $id
     * @param AdFind|null $adFind_fk
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?AdFind $adFind_fk = null, ?User $user_fk = null) {
        $this->id = $id;
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