<?php

namespace AppBundle\Controller;

use AppBundle\Form\Employee\ProjectType;
use AppBundle\Model\Employee\Language;
use AppBundle\Model\Employee\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends ApiController
{
    /**
     * @Route("/employee/project", name="employee_project")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {

    }

    /**
     * @Route("/employee/project", name="employee_project_new")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(ProjectType::class);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }

        $data = $form->getData();
        // todo: save

        return $this->success([], Response::HTTP_CREATED);
    }
}
