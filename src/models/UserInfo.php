<?php


class UserInfo
{
    private $name;
    private $surname;
    private $description;
    private $image;
    private $h1;
    private $h2;

    public function __construct(string $name, string $surname, string $description="", string $image="", string $h1="", string $h2="", string $h3="")
    {

        $this->name = $name;
        $this->surname = $surname;
        $this->description = $description;
        $this->image = $image;
        $this->h1 = $h1;
        $this->h2 = $h2;
        $this->h3 = $h3;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getH1()
    {
        return $this->h1;
    }

    public function setH1($h1): void
    {
        $this->h1 = $h1;
    }

    public function getH2()
    {
        return $this->h2;
    }

    public function setH2($h2): void
    {
        $this->h2 = $h2;
    }

    public function getH3()
    {
        return $this->h3;
    }

    public function setH3($h3): void
    {
        $this->h3 = $h3;
    }

    private $h3;



}
