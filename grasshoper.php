<?php
require_once("./people.php");

class Grasshopper extends People
{
    private $login;
    private $totalViews;

    function __construct($name,$age,$sex,$login)
    {
        parent::__construct($name,$age,$sex);
        $this->login = $login;
        $this->totalViews = 0;
    }

    public function earnExp()
    {
        $this->setExp($this->getExp() + 0.25);
    }

    //Useless function
    // private function watchedMore()
    // {
    //     $this->setTotalViews($this->getTotalViews() + 1);
    // }

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
}
