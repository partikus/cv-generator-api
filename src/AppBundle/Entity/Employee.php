<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=30)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=50)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="jobTitle", type="string", length=30)
     */
    private $jobTitle;

    /**
     * @var ArrayCollection|EmployeeSkill[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\EmployeeSkill", cascade={"ALL"}, mappedBy="employee", orphanRemoval=true)
     */
    private $skills;

    /**
     * @var Language
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\EmployeeLanguage", cascade={"ALL"}, mappedBy="employee", orphanRemoval=true)
     */
    private $languages;

    /**
     * @var ArrayCollection|Project[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="employee")
     */
    private $projects;

    public function __construct()
    {
        $this->skills    = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Employee
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Employee
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    public function addSkill(EmployeeSkill $employeeSkill) : void
    {
        if (!$this->skills->contains($employeeSkill)) {
            $this->skills->add($employeeSkill);
        }
    }

    public function removeSkill(EmployeeSkill $employeeSkill)
    {
        $this->skills->removeElement($employeeSkill);
    }

    public function getSkills() : ArrayCollection
    {
        return $this->skills;
    }

    /**
     * @return Language
     */
    public function getLanguages(): ArrayCollection
    {
        return $this->languages;
    }

    public function addLanguage(EmployeeLanguage $language)
    {
        if (!$this->languages->contains($language)) {
            $language->setEmployee($this);
            $this->languages->add($language);
        }
    }

    public function removeLanguage(EmployeeLanguage $language)
    {
        $this->languages->removeElement($language);
    }

    public function getProjects()
    {
        return $this->projects;
    }

    public function addProject(Project $project)
    {
        if (!$this->projects->contains($project)) {
            $project->setEmployee($this);
            $this->projects->add($project);
        }
    }

    public function removeProject(Project $project)
    {
        $this->projects->removeElement($project);
    }
}
