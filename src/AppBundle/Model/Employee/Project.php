<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use AppBundle\Model\Skills;

class Project
{
    private $company;
    private $role;
    private $responsibillites;
    private $skills;
    private $description;
    private $startAt;
    private $endAt;

    public function __construct(
        string $company,
        string $role,
        string $responsibillites,
        Skills $skills,
        string $description,
        \DateTimeImmutable $startAt,
        \DateTimeImmutable $endAt = null
    )
    {
        $this->company = $company;
        $this->role = $role;
        $this->responsibillites = $responsibillites;
        $this->skills = $skills;
        $this->description = $description;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getResponsibillites(): string
    {
        return $this->responsibillites;
    }

    /**
     * @return Skills
     */
    public function getSkills(): Skills
    {
        return $this->skills;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStartAt(): \DateTimeImmutable
    {
        return $this->startAt;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEndAt(): \DateTimeImmutable
    {
        return $this->endAt;
    }
}
