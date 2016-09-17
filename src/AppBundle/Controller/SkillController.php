<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use AppBundle\Form\SkillType;
use AppBundle\Repository\SkillRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends ApiController
{
    /**
     * @Route("/skills", name="skills")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        /** @var SkillRepository $repo */
        $repo = $this->get('doctrine')->getRepository(Skill::class);
        $skills = $repo->findAll();

        $result = array_map(
            function (Skill $skill) {
                return [
                    'id' => $skill->getId(),
                    'name' => $skill->getName(),
                    'url' => $skill->getUrl(),
                    'description' => $skill->getDescription(),
                ];
            },
            $skills
        );

        return $this->success($result);
    }

    /**
     * @Route("/skills/{skill}", name="skills_get", requirements={"id" = "\d+"})
     * @Method({"GET"})
     */
    public function getAction(Skill $skill)
    {
        return $this->success([
            'id' => $skill->getId(),
            'name' => $skill->getName(),
            'url' => $skill->getUrl(),
            'description' => $skill->getDescription(),
        ]);
    }

    /**
     * @Route("/skills", name="skills_create")
     * @Method({"POST", "PUT"})
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(SkillType::class);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }

        $skill = $form->getData();
        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($skill);
        $em->flush();

        return $this->success(
            [
                'id' => $skill->getId(),
                'name' => $skill->getName(),
                'url' => $skill->getUrl(),
                'description' => $skill->getDescription(),
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @Route("/skills/{skill}", name="skills_update", requirements={"id" = "\d+"})
     * @Method({"POST", "PUT"})
     */
    public function updateAction(Request $request, Skill $skill)
    {
        $form = $this->createForm(SkillType::class, $skill);
        $this->handleRequest($request, $form);

        if (!$form->isValid()) {
            $formErrors = $this->getFormErrorsAsArray($form);
            $response = $this->error($formErrors);

            return $response;
        }

        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->persist($skill);
        $em->flush();

        return $this->success([
            'id' => $skill->getId(),
            'name' => $skill->getName(),
            'url' => $skill->getUrl(),
            'description' => $skill->getDescription(),
        ]);
    }

    /**
     * @Route("/skills/{skill}", name="skills_delete", requirements={"id" = "\d+"})
     * @Method({"DELETE"})
     */
    public function deleteAction(Skill $skill)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->remove($skill);
        $em->flush();

        return $this->success([]);
    }
}
