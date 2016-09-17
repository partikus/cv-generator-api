<?php

declare (strict_types = 1);

namespace AppBundle\Model;

use AppBundle\Model\Employee\Details;
use AppBundle\Model\Employee\Email;
use AppBundle\Model\Employee\Languages;
use AppBundle\Model\Employee\Projects;
use AppBundle\Model\Employee\Skills;

class Employee
{
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $jobTitle;
    private $skills;
    private $languages;
    private $projects;
    private $details;

    public function __construct(
        string $firstName, string $lastName,
        string $username, Email $email,
        string $jobTitle, Skills $skills,
        Details $details, Languages $languages,
        Projects $projects
    ) {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->username  = $username;
        $this->email     = $email;
        $this->jobTitle  = $jobTitle;
        $this->skills    = $skills;
        $this->details   = $details;
        $this->languages = $languages;
        $this->projects  = $projects;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * @return Skills
     */
    public function getSkills(): Skills
    {
        return $this->skills;
    }

    /**
     * @return Languages
     */
    public function getLanguages(): Languages
    {
        return $this->languages;
    }

    /**
     * @return Projects
     */
    public function getProjects(): Projects
    {
        return $this->projects;
    }

    /**
     * @return Details
     */
    public function getDetails(): Details
    {
        return $this->details;
    }
}
