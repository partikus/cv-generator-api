<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

class Skill
{
    public function __construct(
        \DateTimeImmutable $startedAt,
        \DateTimeImmutable $endedAt,
        \DateTimeImmutable $lastUsage
    ) {
    }
}
