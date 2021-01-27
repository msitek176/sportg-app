<?php

class Gym
{
    private $address;
    private $name;
    private $image;

    public function __construct($address, $name, $image)
    {
        $this->address = $address;
        $this->name = $name;
        $this->image = $image;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

}