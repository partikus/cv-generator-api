<?php

namespace AppBundle\Controller;

use AppBundle\Form\Employee\EmployeeLanguageType;
use AppBundle\Form\EmployeeType;
use AppBundle\Model\Employee\Language;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends ApiController
{
    /**
     * @Route("/employee", name="employee")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {
        $exampleResponse = [
            'limit' => 1,
            'offset' => 1,
            'total' => 1,
            'items' => [
                [
                    'firstName' => 'John',
                    'lastName' => 'Rambo',
                    'username' => 'jrambo',
                    'email' => 'jrambo@gmail.com',
                    'jobTitle' => 'security leader',
                    'details' => [
                        'experience' => 'IT, music',
                        'education' => '2000 - 2010 Video Gaming High School',
                        'hobbies' => 'playing chess',
                    ],
                    'skills' => [
                        [
                            'skill' => [
                                'name' => 'PHP',
                                'description' => 'PHP PoWeR!!',
                                'url' => 'http://www.php.net/',
                            ],
                            'startDate' => '2004-02-12T15:19:21+00:00',
                            'lastUsage' => '2008-02-12T15:19:21+00:00',
                            'level' => 5,
                        ],
                        [
                            'skill' => [
                                'name' => 'Vagrant',
                                'description' => 'vagrant destroy',
                                'url' => 'https://www.vagrantup.com/',
                            ],
                            'startDate' => '2016-02-12T15:19:21+00:00',
                            'lastUsage' => '',
                            'level' => 2,
                        ],
                    ],
                    'languages' => [
                        [
                            'name' => 'english',
                            'iso3' => 'en',
                            'level' => 5,
                        ],
                        [
                            'name' => 'polish',
                            'iso3' => 'pl',
                            'level' => 4,
                        ],
                    ],
                    'projects' => [
                        [
                            'company' => 'PGS Software',
                            'role' => 'PHP Developer',
                            'responsibilities' => 'Write awesome code!',
                            'skills' => [],
                            'description' => 'Bla bla bla bla',
                            'startDate' => '2010-01-12T15:19:21+00:00',
                            'endDate' => '2015-02-12T15:19:21+00:00',
                        ],
                        [
                            'company' => 'PGS Software',
                            'role' => 'PHP Developer',
                            'responsibilities' => 'Write awesome code!',
                            'skills' => [
                                [
                                    'name' => 'Vagrant',
                                    'description' => 'vagrant destroy',
                                    'url' => 'https://www.vagrantup.com/',
                                ],
                            ],
                            'description' => 'Bla bla bla bla',
                            'startDate' => '2014-02-12T15:19:21+00:00',
                            'endDate' => '',
                        ],
                    ],
                ],
            ],
        ];

        return $this->success($exampleResponse);
    }

    /**
     * @Route("/employee", name="employee_language_new")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(EmployeeType::class);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }


        $entity = $form->getData();
        $em       = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($entity);
        $em->flush();

        return $this->success([], Response::HTTP_CREATED);
    }
}
