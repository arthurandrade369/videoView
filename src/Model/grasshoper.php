<?php
require_once("./people.php");

class Grasshopper
{
    private $name;
    private $birthday;
    private $exp;
    private $login;
    private $totalViews;

    function __construct($name, $birthday, $sex, $login)
    {
        $this->name = $name;
        $this->birthday = $birthday;
        $this->login = $login;
        $this->totalViews = 0;
        $this->exp = 0;
    }

    public function earnExp(Video $video)
    {
        $this->setExp($this->getExp() + ($video->getTime()*0.25));
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getTotalViews()
    {
        return $this->totalViews;
    }
    public function setTotalViews($totalViews)
    {
        $this->totalViews = $totalViews;
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
