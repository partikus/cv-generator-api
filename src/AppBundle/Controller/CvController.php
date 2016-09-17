<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
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

        $id = $pheanstalk->useTube('todo')
                         ->put($serializedEmployee);

        return $this->success(['status' => 'queued', 'id' => $id]);
    }
}
