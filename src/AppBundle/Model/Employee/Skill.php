<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use AppBundle\Model\Skill as BaseSkill;

class Skill
{
    private $skill;
    private $startDate;
    private $lastUsage;
    private $level;

    public function __construct(
        BaseSkill $skill,
        \DateTimeImmutable $startDate,
        \DateTimeImmutable $lastUsage,
        int $level
    ) {
        $this->skill = $skill;
        $this->startDate = $startDate;
        $this->lastUsage = $lastUsage;
        $this->level = $level;
    }

    /**
     * @return BaseSkill
     */
    public function getSkill(): BaseSkill
    {
        return $this->skill;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getLastUsage(): \DateTimeImmutable
    {
        return $this->lastUsage;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}
