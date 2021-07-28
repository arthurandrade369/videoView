<?php
require_once("./people.php");
require_once("../../config/connection-db.php");

class Grasshopper extends People
{
    private $login;
    private $totalViews;

    function __construct($name, $age, $sex, $login)
    {
        parent::__construct($name, $age, $sex);
        $this->login = $login;
        $this->totalViews = 0;

        // try {
        //     $sql = "INSERT INTO grasshopers(name, age, sex, login, totalviews, exp)
        //             values(:name, :age, :sex, :login, :totalviews, :exp)";
        //     $p_sql = Connection::getInstance()->prepare($sql);
        //     $p_sql->bindValue("name", $name);
        //     $p_sql->bindValue("age", $age);
        //     $p_sql->bindValue("sex", $sex);
        //     $p_sql->bindValue("login", $login);
        //     $p_sql->bindValue("totalviews", 0);
        //     $p_sql->bindValue("exp", 0);
        //     $p_sql->execute();

        //     echo "Cadastro realizado com sucesso!";
        // } catch (PDOException $e) {
        //     die("Error " . $e->getMessage());
        // }
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
