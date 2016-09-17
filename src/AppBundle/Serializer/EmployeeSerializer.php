<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\Employee;

class EmployeeSerializer
{
    public function __invoke(Employee $employee)
    {
        return [
            'id' => $employee->getId(),
            'firstName' => $employee->getFirstName(),
            'lastName' => $employee->getLastName(),
            'education' => $employee->getEducation(),
            'email' => $employee->getEmail(),
            'experience' => $employee->getExperience(),
            'hobbies' => $employee->getHobbies(),
            'jobTitle' => $employee->getJobTitle(),
            'languages' => $employee->getLanguages(),
            'projects' => $employee->getProjects(),
            'skills' => $employee->getSkills(),
        ];
    }
}