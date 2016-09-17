<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

class Project
{
    private $company;
    private $role;
    private $responsibilities;
    private $skills;
    private $description;
    private $startDate;
    private $endDate;

    public function __construct(
        string $company,
        string $role,
        string $responsibilities,
        Skills $skills,
        string $description,
        \DateTimeImmutable $startDate,
        \DateTimeImmutable $endDate = null
    )
    {
        $this->company          = $company;
        $this->role             = $role;
        $this->responsibilities = $responsibilities;
        $this->skills           = $skills;
        $this->description      = $description;
        $this->startDate        = $startDate;
        $this->endDate          = $endDate;
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
    public function getResponsibilities(): string
    {
        return $this->responsibilities;
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
}
