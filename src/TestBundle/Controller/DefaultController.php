<?php

namespace TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", name="test_homepage")
     */
    public function indexAction($name)
    {
        return $this->render('TestBundle:Default:index.html.twig', array('name' => $name));
    }
}
