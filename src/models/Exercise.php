<?php

class Exercise
{
    private $name;
    private $description;
    private $series;
    private $reps;
    private $image;
    private $time;
    private $count;
    private $id_exercise;

    public function __construct($name, $description, $time, $series, $reps, $image,  $count=0, $id_exercise=null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->series = $series;
        $this->reps = $reps;
        $this->image = $image;
        $this->time = $time;
        $this->count = $count;
        $this->id_exercise = $id_exercise;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function getSeries(): string
    {
        return $this->series;
    }

    public function setSeries(string $series): void
    {
        $this->series = $series;
    }

    public function getReps(): string
    {
        return $this->reps;
    }

    public function setReps(string $reps): void
    {
        $this->reps = $reps;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getId()
    {
        return $this->id_exercise;
    }

    public function setId($id_exercise): void
    {
        $this->id_exercise = $id_exercise;
    }

}