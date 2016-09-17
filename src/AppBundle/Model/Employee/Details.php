<?php

namespace AppBundle\Model\Employee;

class Details
{
    private $experience;
    private $eduction;
    private $hobbies;

    public function __construct(
        string $exeprience,
        string $eduction,
        string $hobbies
    ) {
        $this->experience = $exeprience;
        $this->eduction = $eduction;
        $this->hobbies = $hobbies;
    }

    /**
     * @return string
     */
    public function getExperience(): string
    {
        return $this->experience;
    }

    /**
     * @return string
     */
    public function getEduction(): string
    {
        return $this->eduction;
    }

    /**
     * @return string
     */
    public function getHobbies(): string
    {
        return $this->hobbies;
    }
}
