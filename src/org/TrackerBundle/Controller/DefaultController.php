<?php

namespace org\TrackerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/tracker/{name}/{number}/{updn}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
