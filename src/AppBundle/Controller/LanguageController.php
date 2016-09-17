<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Language;
use AppBundle\Form\Employee\EmployeeLanguageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends ApiController
{
    /**
     * @Route("/languages", name="languages")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {
        $repo      = $this->get('doctrine')->getRepository(\AppBundle\Entity\Language::class);
        $languages = $repo->findAll();

        $result = array_map(
            function (Language $language) {
                return [
                    'id'   => $language->getId(),
                    'iso3' => $language->getIso3(),
                    'name' => $language->getName(),
                ];
            },
            $languages
        );

        return JsonResponse::create($result);
    }

    /**
     * @Route("/languages/", name="language_create")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(EmployeeLanguageType::class);
        $this->handleRequest($request, $form);

        if ( ! $form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response   = $this->error($formErrors);

            return $response;
        }

        $language = $form->getData();
        $em       = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($language);
        $em->flush();

        return $this->success(
            [
                'id'   => $language->getId(),
                'iso3' => $language->getIso3(),
                'name' => $language->getName(),
            ],
            Response::HTTP_CREATED
        );
    }
}
