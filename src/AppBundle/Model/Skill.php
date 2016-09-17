<?php

declare (strict_types = 1);

namespace AppBundle\Model;

class Skill
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
