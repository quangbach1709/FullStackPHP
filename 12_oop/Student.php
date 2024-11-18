<?php
require_once "Person.php";

class Student extends Person
{
    public string $studentId;

    public function __construct($name, $surname, $studentId)
    {
        parent::__construct($name, $surname);//goi constructor cua class cha de khoi tao name va surname
        $this->age = 20;
        $this->studentId = $studentId;
    }

}