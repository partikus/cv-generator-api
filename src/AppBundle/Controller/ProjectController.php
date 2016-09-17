<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use AppBundle\Entity\Project;
use AppBundle\Form\Employee\ProjectType;
use AppBundle\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends ApiController
{
    /**
     * @Route("/employees/{employee}/projects", name="projects")
     * @Method({"GET"})
     */
    public function indexAction(Employee $employee)
    {
        /** @var ProjectRepository $repo */
        $repo = $this->get('doctrine')->getRepository(Project::class);
        $projects = $repo->findBy([
            'employee' => $employee,
        ]);

        $result = array_map(
            function (Project $project) {
                return [
                    'id' => $project->getId(),
                    'employee' => $project->getEmployee()->getId(),
                    'name' => $project->getName(),
                    'company' => $project->getCompany(),
                    'role' => $project->getRole(),
                    'responsibilities' => $project->getResponsibilities(),
                    'description' => $project->getDescription(),
                    'startDate' => $project->getStartDate()->format('c'),
                    'endDate' => $project->getEndDate()->format('c'),
                ];
            },
            $projects
        );

        return $this->success($result);
    }

    /**
     * @Route("/employees/{employee}/projects/{project}", name="projects_get", requirements={"id" = "\d+"})
     * @Method({"GET"})
     */
    public function getAction(Project $project)
    {
        return $this->success([
            'id' => $project->getId(),
            'employee' => $project->getEmployee()->getId(),
            'name' => $project->getName(),
            'company' => $project->getCompany(),
            'role' => $project->getRole(),
            'responsibilities' => $project->getResponsibilities(),
            'description' => $project->getDescription(),
            'startDate' => $project->getStartDate()->format('c'),
            'endDate' => $project->getEndDate()->format('c'),
        ]);
    }

    /**
     * @Route("/employees/{employee}/projects", name="projects_new")
     * @Method({"POST", "PUT"})
     */
    public function addAction(Request $request, Employee $employee)
    {
        $form = $this->createForm(ProjectType::class);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }

        /** @var Project $project */
        $project = $form->getData();
        $project->setEmployee($employee);
        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($project);
        $em->flush();

        return $this->success(
            [
                'id' => $project->getId(),
                'employee' => $project->getEmployee()->getId(),
                'name' => $project->getName(),
                'company' => $project->getCompany(),
                'role' => $project->getRole(),
                'responsibilities' => $project->getResponsibilities(),
                'description' => $project->getDescription(),
                'startDate' => $project->getStartDate()->format('c'),
                'endDate' => $project->getEndDate()->format('c'),
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @Route("/employees/{employee}/projects/{project}", name="projects_update", requirements={"id" = "\d+"})
     * @Method({"POST", "PUT"})
     */
    public function updateAction(Request $request, Project $project)
    {
        $form = $this->createForm(ProjectType::class, $project);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }

        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($project);
        $em->flush();

        return $this->success([
            'id' => $project->getId(),
            'employee' => $project->getEmployee()->getId(),
            'name' => $project->getName(),
            'company' => $project->getCompany(),
            'role' => $project->getRole(),
            'responsibilities' => $project->getResponsibilities(),
            'description' => $project->getDescription(),
            'startDate' => $project->getStartDate()->format('c'),
            'endDate' => $project->getEndDate()->format('c'),
        ]);
    }

    /**
     * @Route("/employees/{employee}/projects/{project}", name="projects_delete", requirements={"id" = "\d+"})
     * @Method({"DELETE"})
     */
    public function deleteAction(Project $project)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->remove($project);
        $em->flush();

        return $this->success([]);
    }
}
