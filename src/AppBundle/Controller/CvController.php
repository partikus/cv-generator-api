<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use AppBundle\Entity\Job;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CvController extends ApiController
{
    /**
     * @Route("/cv/{username}", name="cv_generate")
     * @Method({"POST"})
     * @ParamConverter(class="AppBundle\Entity\Employee")
     */
    public function generateAction(Request $request, Employee $employee)
    {
        $pheanstalk = $this->get('app.pheanstalk');
        $serializer = $this->get('app.serializer');

        $serializedEmployee = $serializer->serialize($employee, 'json');

        $id = $pheanstalk->useTube('todo')->put($serializedEmployee);
        $job = new Job($id);
        $job->setEmployee($employee);
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($job);
        $em->flush($job);

        return $this->success(['status' => 'queued', 'id' => $id]);
    }
}
