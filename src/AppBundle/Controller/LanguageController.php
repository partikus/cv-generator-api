<?php

namespace AppBundle\Controller;

use AppBundle\Form\Employee\LanguageType;
use AppBundle\Model\Employee\Language;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends ApiController
{
    /**
     * @Route("/employee/language", name="employee_language")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {

    }

    /**
     * @Route("/employee/language", name="employee_language_new")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(LanguageType::class);
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
