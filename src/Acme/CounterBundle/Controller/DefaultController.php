<?php

namespace Acme\CounterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($item)
    {
        return $this->render('AcmeCounterBundle:Default:index.html.twig', array('item' => $item));
    }
}
