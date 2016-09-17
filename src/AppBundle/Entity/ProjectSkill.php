<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectSkill
 *
 * @ORM\Table(name="project_skill")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectSkill")
 */
class ProjectSkill
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
     * @var Skill
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Skill")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id")
     */
    private $skill;

    /**
     * @var Project
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="skills")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

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
     * @return Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param Skill $skill
     *
     * @return ProjectSkill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     *
     * @return ProjectSkill
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }
}
