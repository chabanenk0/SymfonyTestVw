<?php

namespace chab\TestTourBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use chab\TestTourBundle\Entity\Tour;
use chab\TestTourBundle\Form\TourType;

/**
 * Tour controller.
 *
 */
class TourController extends Controller
{

    /**
     * Lists all Tour entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('chabTestTourBundle:Tour')->findAll();

        return $this->render('chabTestTourBundle:Tour:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tour entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tour();
        $form = $this->createForm(new TourType(), $entity);
        $form->bind($request);
            //echo "city=";
            //$city=$entity->getCity();
            //$cityid=1;//$city->getId();
            //$entity->setCity($cityid);
            //print_r($entity);
            //$categories=$entity->getCategory();
            $entity->setCategory(0);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('tour_show', array('id' => $entity->getId())));
        }

        return $this->render('chabTestTourBundle:Tour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tour entity.
     *
     */
    public function newAction()
    {
        $entity = new Tour();
        $form   = $this->createForm(new TourType(), $entity);

        return $this->render('chabTestTourBundle:Tour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tour entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('chabTestTourBundle:Tour:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tour entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $editForm = $this->createForm(new TourType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('chabTestTourBundle:Tour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tour entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TourType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tour_edit', array('id' => $id)));
        }

        return $this->render('chabTestTourBundle:Tour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tour entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('chabTestTourBundle:Tour')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tour entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tour'));
    }

    /**
     * Creates a form to delete a Tour entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
