<?php

declare (strict_types = 1);

namespace AppBundle\Model;

use AppBundle\Model\Employee\Email;
use AppBundle\Model\Employee\Languages;
use AppBundle\Model\Employee\Projects;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Employee
 * @package AppBundle\Model
 */
class Employee
{
    private $firstName;
    private $lastName;
    private $userName;
    private $email;
    private $jobTitle;
    private $skills;
    private $languages;
    private $projects;

    public function __construct(
        string $firstName, string $lastName,
        string $username, Email $email,
        string $jobTitle, Skills $skills,
        Languages $languages, Projects $projects
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $username;
        $this->email = $email;
        $this->jobTitle = $jobTitle;
        $this->skills = $skills;
        $this->languages = $languages;
        $this->projects = $projects;
    }
}
