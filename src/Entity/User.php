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
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFName(): ?string
    {
        return $this->fname;
    }

    public function setFName(string $fname)
    {
        $this->fname = $fname;
    }

    public function getLName(): ?string
    {
        return $this->lname;
    }

    public function setLName(string $lname)
    {
        $this->lname = $lname;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function SetEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password)
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

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function setObject($object) {
        $this->setFName($object['fname']);
        $this->setLName($object['lname']);
        $this->setEmail($object['email']);
        $this->setPassword($object['password']);
        $this->setBirthday($object['birthday']);
        $this->setCreated(date("Y-m-d"));
        $this->setEnabled(true);  
        
        return $this;
    }
}
