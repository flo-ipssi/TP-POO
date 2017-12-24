<?php
declare(strict_types=1);

namespace Application\Entity;


class Meeting
{
    private $date_start;

    private $date_end;

    private $title;

    private $description;

    public function __construct(String $title, String $description, \DateTime $date_start, \DateTime $date_end)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}