<?php
namespace Acme\CounterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\CounterBundle\Entity\Item;
use Symfont\Component\HttpFoundation\Response;

class TrackerController extends Controller
{
	
public function updateAction($item)
{
    $em = $this->getDoctrine()->getManager();
    $item = $em->getRepository('AcmeCounterBundle:Item')->find($item);

    if (!$item) {
        throw $this->createNotFoundException(
            'No item found with that name '.$item
        );
    }

    $item->setName($item);
    $em->flush();

    return $this->redirect($this->generateUrl('homepage'));
}

public function indexAction($item)
    {
        return $this->render('AcmeCounterBundle:Default:index.html.twig', array('item' => $item));
    }
}
