<?php

declare (strict_types = 1);

namespace AppBundle\Model;

use AppBundle\Model\Employee\Email;
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

    public function __construct(
        string $firstName, string $lastName,
        string $username, Email $email,
        string $jobTitle, Skills $skills
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $username;
        $this->email = $email;
        $this->jobTitle = $jobTitle;
        $this->skills = $skills;
    }
}
