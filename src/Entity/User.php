<?php

declare(strict_types=1);

namespace Application\Entity;


class User
{
    /**
     * @var string
     */
    private $Name;

    public function __construct(string $Name)
    {
        $this->Name = $Name;
    }

    public function getName(): string
    {
        return $this->Name;
    }
}