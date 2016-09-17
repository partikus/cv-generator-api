<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

class Language
{
    const LEVEL_A1 = 1;
    const LEVEL_A2 = 2;
    const LEVEL_B1 = 3;
    const LEVEL_B2 = 4;
    const LEVEL_C1 = 5;
    const LEVEL_C2 = 6;

    private $name;
    private $iso3;
    private $level;

    public function __construct(
        string $name,
        string $iso3,
        int $level
    ) {
        $this->name = $name;
        $this->iso3 = $iso3;
        $this->level = $level;
    }
}
