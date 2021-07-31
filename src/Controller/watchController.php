<?php
require_once("./grasshoper.php");
require_once("./video.php");
class Views
{
    private $viewer;
    private $movie;

    function __construct($viewer, $movie)
    {
        $this->viewer = $viewer;
        $this->movie = $movie;
        $this->movie->setViews($this->movie->getViews() + 1);
        $this->viewer->setTotalViews($this->viewer->getTotalViews() + 1);
        $this->viewer->earnExp();
    }

    public function rate()
    {
        $this->movie->setRating($this->movie->getRating() + 5);
    }
    public function rateGrade($grade)
    {
        $this->movie->setRating($this->movie->getRating() + $grade);
    }
    public function ratePercent($percent)
    {
        $var = 0;
        if ($percent <= 20) {
            $var = 3;
        } elseif ($percent <= 50) {
            $var = 5;
        } elseif ($percent <= 90) {
            $var = 8;
        } else {
            $var = 10;
        }
        $this->movie->setRating($this->movie->getRating() + $var);
    }

    public function likes()
    {
        $this->movie->setLikes($this->movie->getLikes() + 1);
    }

    // public function getViewer()
    // {
    //     return $this->viwer;
    // }
    // public function setViewer($viewer)
    // {
    //     $this->viwer = $viewer;
    // }

    // public function getMovie()
    // {
    //     return $this->movie;
    // }
    // public function setMovie($movie)
    // {
    //     $this->movie = $movie;
    // }
}
