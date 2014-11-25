<?php

namespace org\TrackerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use org\TrackerBundle\Entity\Thing;
use org\TrackerBundle\Form\ThingType;

/**
 * Thing controller.
 *
 * @Route("/tracker")
 */
class ThingController extends Controller
{

    /**
     * Lists all Thing entities.
     *
     * @Route("/", name="thing")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('orgTrackerBundle:Thing')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Creates a new Thing entity.
     *
     * @Route("/", name="thing_create")
     * @Method("POST")
     * @Template("orgTrackerBundle:Thing:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Thing();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('thing_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Thing entity.
     *
     * @param Thing $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Thing $entity)
    {
        $form = $this->createForm(new ThingType(), $entity, array(
            'action' => $this->generateUrl('thing_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Thing entity.
     *
     * @Route("/new", name="thing_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Thing();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Thing entity.
     *
     * @Route("/{id}", name="thing_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('orgTrackerBundle:Thing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Thing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Thing entity.
     *
     * @Route("/{id}/edit", name="thing_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('orgTrackerBundle:Thing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Thing entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Thing entity.
    *
    * @param Thing $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Thing $entity)
    {
        $form = $this->createForm(new ThingType(), $entity, array(
            'action' => $this->generateUrl('thing_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Thing entity.
     *
     * @Route("/{id}", name="thing_update")
     * @Method("PUT")
     * @Template("orgTrackerBundle:Thing:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('orgTrackerBundle:Thing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Thing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('thing_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Thing entity.
     *
     * @Route("/{id}", name="thing_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('orgTrackerBundle:Thing')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Thing entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('thing'));
    }

    /**
     * Creates a form to delete a Thing entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('thing_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
