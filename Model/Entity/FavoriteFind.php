<?php

namespace Model\Entity;

class FavoriteFind {

    private ?int $id;
    private ?int $adFind_fk;
    private ?int $user_fk;

    /**
     * FavoriteFind constructor.
     * @param int|null $id
     * @param int|null $adFind_fk
     * @param int|null $user_fk
     */
    public function __construct(?int $id = null, ?int $adFind_fk = null, ?int $user_fk = null) {
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
     * @return int|null
     */
    public function getAdFindFk(): ?int {
        return $this->adFind_fk;
    }

    /**
     * @param int|null $adFind_fk
     */
    public function setAdFindFk(?int $adFind_fk): void {
        $this->adFind_fk = $adFind_fk;
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