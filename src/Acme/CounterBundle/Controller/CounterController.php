<?php
namespace Acme\CounterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\CounterBundle\Entity\Item;
use Symfont\Component\HttpFoundation\Response;

class CounterController extends Controller
{
	
public function createAction()
{
	$item = new Item();
	$item->setName($item);
	$item->setNumber($number);
	
	$em = $this->getDoctrine()->getManager();
	$em->persist($item);
	$em->flush();


}

public function indexAction($item)
    {
        return $this->render('AcmeCounterBundle:Default:index.html.twig', array('item' => $item));
    }
}
