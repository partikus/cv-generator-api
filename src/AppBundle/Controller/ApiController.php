<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @param Form $form
     *
     * @return array
     */
    protected function getFormErrorsAsArray(Form $form) : array
    {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            $errors[$key] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            /** @var Form $child */
            if ($child->isValid()) {
                continue;
            }
            $key = $child->getName();
            $errors[$key] = $this->getFormErrorsAsArray($child);
        }

        return $errors;
    }

    /**
     * @param array $content
     * @param int $code
     *
     * @return Response
     */
    protected function error(array $content, int $code = Response::HTTP_BAD_REQUEST) : Response
    {
        return $this->response($content, $code);
    }

    /**
     * @param array $content
     * @param int $code
     *
     * @return Response
     */
    protected function success(array $content, int $code = Response::HTTP_OK) : Response
    {
        return $this->response($content, $code);
    }

    /**
     * @param array $content
     * @param int $code
     *
     * @return Response
     */
    protected function response(array $content, int $code) : Response
    {
        $response = new Response();

        if (!empty($content)) {
            $content = json_encode($content);
            $response->setContent($content);
        }
        $response->setStatusCode($code);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @param Request $request
     * @param Form $form
     */
    protected function handleRequest(Request $request, Form $form)
    {
        $content = $request->getContent();
        if (empty($content)) {
            $data = $request->request->all();
        } else {
            $data = json_decode($content, true);
        }

        $form->submit($data);
    }
}
