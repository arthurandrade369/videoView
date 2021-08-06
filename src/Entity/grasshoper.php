<?php
require_once("./people.php");

class Grasshopper
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $created;
    private $modified;
    private $enabled;
    private $birthday;

    function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getExp()
    {
        return $this->exp;
    }
    public function setExp($exp)
    {
        $this->exp = $exp;
    }
}
