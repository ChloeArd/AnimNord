<?php

namespace Model\Entity;

class AdLost {

    private ?int $id;
    private ?string $animal;
    private ?string $name;
    private ?string $sex;
    private ?string $size;
    private ?string $fur;
    private ?string $color;
    private ?string $dress;
    private ?string $race;
    private ?int $number;
    private ?string $description;
    private ?string $date_lost;
    private ?string $date;
    private ?string $city;
    private ?string $picture;
    private ?int $user_fk;

    /**
     * AdLost constructor.
     * @param int|null $id
     * @param string|null $animal
     * @param string|null $name
     * @param string|null $sex
     * @param string|null $size
     * @param string|null $fur
     * @param string|null $color
     * @param string|null $dress
     * @param string|null $race
     * @param int|null $number
     * @param string|null $description
     * @param string|null $date_lost
     * @param string|null $date
     * @param string|null $city
     * @param string|null $picture
     * @param int|null $user_fk
     */
    public function __construct(?int $id = null, ?string $animal = null, ?string $name = null, ?string $sex = null, ?string $size = null,
                                ?string $fur = null, ?string $color = null, ?string $dress = null, ?string $race = null, ?int $number = null,
                                ?string $description = null, ?string $date_lost = null, ?string $date = null, ?string $city = null, ?string $picture = null,
                                ?int $user_fk = null) {
        $this->id = $id;
        $this->animal = $animal;
        $this->name = $name;
        $this->sex = $sex;
        $this->size = $size;
        $this->fur = $fur;
        $this->color = $color;
        $this->dress = $dress;
        $this->race = $race;
        $this->number = $number;
        $this->description = $description;
        $this->date_lost = $date_lost;
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
    public function setAnimal(?string $animal): void {
        $this->animal = $animal;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void {
        $this->name = $name;
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
    public function setSex(?string $sex): void {
        $this->sex = $sex;
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
    public function setSize(?string $size): void {
        $this->size = $size;
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
    public function setFur(?string $fur): void {
        $this->fur = $fur;
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
    public function setColor(?string $color): void {
        $this->color = $color;
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
    public function setDress(?string $dress): void {
        $this->dress = $dress;
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
    public function setRace(?string $race): void {
        $this->race = $race;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void {
        $this->number = $number;
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
    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDateLost(): ?string {
        return $this->date_lost;
    }

    /**
     * @param string|null $date_lost
     */
    public function setDateLost(?string $date_lost): void {
        $this->date_lost = $date_lost;
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
     * @return string|null
     */
    public function getCity(): ?string {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void {
        $this->city = $city;
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
    public function setPicture(?string $picture): void {
        $this->picture = $picture;
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