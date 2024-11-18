<?php

class Person
{
    public static int $counter = 0;//static variable
    public string $name;
    public string $surname;
    protected ?int $age; // neu them dau ? thi co the gan gia tri null

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = null;
        self::$counter++;
    }

    public static function getCounter()//static method can only access static variable
    {
        return self::$counter;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}