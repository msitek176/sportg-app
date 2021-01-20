<?php


class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $salt;


    public function __construct(string $email, string $password, string $name, string $surname, string $salt)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->salt = $salt;

    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt)
    {
        $this->salt = $salt;
    }

}