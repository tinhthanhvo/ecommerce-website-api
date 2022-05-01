<?php

namespace App\Controller\Api;

use App\Controller\BaseController;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class HomepageController extends BaseController

{
    /**
     * @Rest\Get("/home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->handleView($this->view("Hello", Response::HTTP_OK));
    }
}
