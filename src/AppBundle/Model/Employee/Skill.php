<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use AppBundle\Model\Skill as BaseSkill;

class Skill
{
    private $skill;
    private $startDate;
    private $endDate;
    private $lastUsage;
    private $level;

    public function __construct(
        BaseSkill $skill,
        \DateTimeImmutable $startDate,
        \DateTimeImmutable $endDate,
        \DateTimeImmutable $lastUsage,
        int $level
    ) {
        $this->skill = $skill;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
    public function getEndDate(): \DateTimeImmutable
    {
        return $this->endDate;
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
