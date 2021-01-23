<?php


class UserInfo
{
    private $name;
    private $surname;
    private $description;
    private $image;
    private $hobby1;
    private $hobby2;
    private $hobby3;

    public function __construct(string $name, string $surname, string $description=" ", string $image=" ", string $hobby1=" ", string $hobby2=" ", string $hobby3=" ")
    {

        $this->name = $name;
        $this->surname = $surname;
        $this->description = $description;
        $this->image = $image;
        $this->hobby1 = $hobby1;
        $this->hobby2 = $hobby2;
        $this->hobby3 = $hobby3;

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

    public function getHobby1()
    {
        return $this->hobby1;
    }

    public function setHobby1($hobby1): void
    {
        $this->hobby1 = $hobby1;
    }

    public function getHobby2()
    {
        return $this->hobby2;
    }

    public function setHobby2($hobby2): void
    {
        $this->hobby2 = $hobby2;
    }

    public function getHobby3()
    {
        return $this->hobby3;
    }

    public function setHobby3($hobby3): void
    {
        $this->hobby3 = $hobby3;
    }




}
