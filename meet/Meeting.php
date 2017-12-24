<?php

declare(strict_types=1);

namespace Meeting;
use Meeting\Liste\Liste;
class Meeting
{
    public function __construct()
    {
        $this->parler();
    }

    public function parler(){
    	echo "string";
    }
}
