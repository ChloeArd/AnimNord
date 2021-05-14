<?php

namespace Model\Entity;

class AdFind {

    private ?int $id;
    private ?string $animal;
    private ?string $sex;
    private ?string $size;
    private ?string $fur;
    private ?string $color;
    private ?string $dress;
    private ?string $race;
    private ?string $number;
    private ?string $description;
    private ?string $date_find;
    private ?string $date;
    private ?string $city;
    private ?string $picture;
    private ?User $user_fk;

    /**
     * adFind constructor.
     * @param int|null $id
     * @param string|null $animal
     * @param string|null $sex
     * @param string|null $size
     * @param string|null $fur
     * @param string|null $color
     * @param string|null $dress
     * @param string|null $race
     * @param string|null $number
     * @param string|null $description
     * @param string|null $date_find
     * @param string|null $date
     * @param string|null $city
     * @param string|null $picture
     * @param User|null $user_fk
     */
    public function __construct(?int $id = null, ?string $animal = null, ?string $sex = null, ?string $size = null, ?string $fur = null,
                                ?string $color = null, ?string $dress = null, ?string $race = null, ?string $number = null, ?string $description = null,
                                ?string $date_find = null, ?string $date = null, ?string $city = null, ?string $picture = null, ?User $user_fk = null) {
        $this->id = $id;
        $this->animal = $animal;
        $this->sex = $sex;
        $this->size = $size;
        $this->fur = $fur;
        $this->color = $color;
        $this->dress = $dress;
        $this->race = $race;
        $this->number = $number;
        $this->description = $description;
        $this->date_find = $date_find;
        $this->date = $date;
        $this->city = $city;
        $this->picture = $picture;
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
    public function getAnimal(): ?string {
        return $this->animal;
    }

    /**
     * @param string|null $animal
     */
    public function setAnimal(?string $animal): string {
        $this->animal = $animal;
        return $animal;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string {
        return $this->sex;
    }

    /**
     * @param string|null $sex
     */
    public function setSex(?string $sex): string {
        $this->sex = $sex;
        return $sex;
    }

    /**
     * @return string|null
     */
    public function getSize(): ?string {
        return $this->size;
    }

    /**
     * @param string|null $size
     */
    public function setSize(?string $size): string {
        $this->size = $size;
        return $size;
    }

    /**
     * @return string|null
     */
    public function getFur(): ?string {
        return $this->fur;
    }

    /**
     * @param string|null $fur
     */
    public function setFur(?string $fur): string {
        $this->fur = $fur;
        return $fur;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(?string $color): string {
        $this->color = $color;
        return $color;
    }

    /**
     * @return string|null
     */
    public function getDress(): ?string {
        return $this->dress;
    }

    /**
     * @param string|null $dress
     */
    public function setDress(?string $dress): string {
        $this->dress = $dress;
        return $dress;
    }

    /**
     * @return string|null
     */
    public function getRace(): ?string {
        return $this->race;
    }

    /**
     * @param string|null $race
     */
    public function setRace(?string $race): string {
        $this->race = $race;
        return $race;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): string {
        $this->number = $number;
        return $number;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): string {
        $this->description = $description;
        return $description;
    }

    /**
     * @return string|null
     */
    public function getDateFind(): ?string {
        return $this->date_find;
    }

    /**
     * @param string|null $date_find
     */
    public function setDateFind(?string $date_find): string {
        $this->date_find = $date_find;
        return $date_find;
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
    public function setDate(?string $date): string {
        $this->date = $date;
        return $date;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): string {
        $this->city = $city;
        return $city;
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
     * @return User|null
     */
    public function getUserFk(): ?User {
        return $this->user_fk;
    }

    /**
     * @param User|null $user_fk
     * @return User
     */
    public function setUserFk(?User $user_fk): User {
        $this->user_fk = $user_fk;
        return $user_fk;
    }


}