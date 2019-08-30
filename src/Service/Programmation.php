<?php


namespace App\Service;


class Programmation
{

    private $dateNow;

    public function __construct()
    {
        $this->dateNow = new \DateTime('NOW', new \DateTimeZone('Europe/Paris'));
    }

    public function isPast(?\DateTimeInterface $date): bool
    {
        if($date < $this->dateNow)
        {
            return true;
        }
        return false;
    }

    public function isInDateInterval()
    {

    }
}