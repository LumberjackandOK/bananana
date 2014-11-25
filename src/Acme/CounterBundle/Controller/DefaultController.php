<?php

namespace Acme\CounterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeCounterBundle:Default:index.html.twig', array('name' => $name));
    }
}
