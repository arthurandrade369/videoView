<?php

require_once("./acessVideo.php");

class Video implements AcessVideo
{
    private $title;
    private $rating;
    private $views;
    private $likes;
    private $reproducing;

    function __construct($title)
    {
        $this->title = $title;
        $this->rating = 0;
        $this->views = 0;
        $this->likes = 0;
        $this->reproducing = false;
    }

    public function play()
    {
        if (!$this->getReproducing()) {
            $this->setReproducing(true);
        } else {
            $this->setReproducing(false);
        }
    }
    public function pause()
    {
        if ($this->getReproducing()) {
            $this->setReproducing(true);
        } else {
            $this->setReproducing(false);
        }
    }
    public function like()
    {
        $this->like++;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getRating()
    {
        return $this->rating;
    }
    public function setRating($rating)
    {
        $average = ($this->rating + $rating)/$this->views;
        $this->rating = number_format($average,2);
    }

    public function getViews()
    {
        return $this->views;
    }
    public function setViews($views)
    {
        $this->views = $views;
    }

    public function getLikes()
    {
        return $this->likes;
    }
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getReproducing()
    {
        return $this->reproducing;
    }
    public function setReproducing($reproducing)
    {
        $this->reproducing = $reproducing;
    }
}
