<?php

namespace tracker\PipelineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tracker\PipelineBundle\Entity\Object;
use tracker\PipelineBundle\Form\ObjectType;

/**
 * Object controller.
 *
 * @Route("/tracker")
 */
class TrackerController extends Controller
{
    
    /**
     * Checks for the Object entity, and adds/updates.
     *
     * @Route("/{objectname}/{number}/{updn}")
     * @Method("GET")
     * 
     */
     public function indexAction($objectname, $number, $updn)
    {
       			$em = $this->getDoctrine()->getManager();

                $entity = $em->getRepository('trackerPipelineBundle:Object')->findOneByobjectName($objectname);
       			var_dump ($entity);
       			
       			if ($entity = NULL) 
       			// checking for existence of object
       			
       			{
					// add the new object to the database
				}
				
		}
}
