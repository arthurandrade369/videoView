<?php

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fname;

    /**
     * @var string
     */
    private $lname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $created;

    /**
     * @var string
     */
    private $modified;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $birthday;

    function __construct()
    {
        $this->id = intval(mt_rand(100,999));
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFName(): ?string
    {
        return $this->fname;
    }
    public function setFName($fname)
    {
        $this->fname = $fname;
    }

    public function getLName(): ?string
    {
        return $this->lname;
    }
    public function setLName($lname)
    {
        $this->lname = $lname;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function SetEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCreated(): ?string
    {
        return $this->created;
    }
    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getModified(): ?string
    {
        return $this->modified;
    }
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
}
