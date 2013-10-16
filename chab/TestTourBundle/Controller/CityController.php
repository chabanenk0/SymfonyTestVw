<?php

namespace chab\TestTourBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use chab\TestTourBundle\Entity\City;
use chab\TestTourBundle\Form\CityType;

/**
 * City controller.
 *
 */
class CityController extends Controller
{

    /**
     * Lists all City entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('chabTestTourBundle:City')->findAll();
		$query = $em->createQuery('SELECT p FROM chabTestTourBundle:City p,chabTestTourBundle:Tour q WHERE p=q.City_1 and q.is_public = 1' );
        $cities = $query->getResult();
		
		$entities=array();
		foreach ($cities as $city)
		 {
		    $toursarray=array();
			//$toursarray[0]=array('id'=>1,'name'=>'testtour','info'=>'testinfo');
			$query2 = $em->createQuery('SELECT q FROM chabTestTourBundle:City p,chabTestTourBundle:Tour q WHERE p.id= :cityid and p=q.City_1 and q.is_public = 1' )->setParameter('cityid',$city->getId());
			$tours = $query2->getResult();
			$i=0;
			foreach ($tours as $tour)
			{
			  $toursarray[$tour->getId()]=array('id'=>$tour->getId(),'name'=>$tour->getName());
			  $i=$i+1;
			  if ($i>=5) break;
			}
		    $entities[$city->getId()]=array('id'=>$city->getId(),'name'=>$city->getName(),'tour'=>$toursarray);
		 }
		 //print_r($toursarray);
        return $this->render('chabTestTourBundle:City:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new City entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new City();
        $form = $this->createForm(new CityType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('city_show', array('id' => $entity->getId())));
        }

        return $this->render('chabTestTourBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new City entity.
     *
     */
    public function newAction()
    {
        $entity = new City();
        $form   = $this->createForm(new CityType(), $entity);

        return $this->render('chabTestTourBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a City entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

		$query2 = $em->createQuery('SELECT q FROM chabTestTourBundle:City p,chabTestTourBundle:Tour q WHERE p.id= :cityid and p=q.City_1 and q.is_public = 1' )->setParameter('cityid',$entity->getId());
				
		$tours = $query2->getResult();
		$toursarray = array();
		foreach ($tours as $tour)
			{
			//$query3 = $em->createQuery('SELECT q FROM chabTestTourBundle:Tour p,chabTestTourBundle:Category q WHERE p.id= :tourid and q in (SELECT p.categories FROM chabTestTourBundle:Category p WHERE p.id= :tourid)' )->setParameter('tourid',$tour->getId());
				
			$categories = $tour->getCategories()->toArray();//$query3->getResult();
			//echo "name=".$categories[0]->getCategory();
			//$tourslist[$city->getId()]=array('id'=>$city->getId(),'name'=>$city->getName(),'tour'=>$toursarray);
			$toursarray[$tour->getId()]=array('id'=>$tour->getId(),'name'=>$tour->getName(),'categories'=>$categories);
			}

		
        return $this->render('chabTestTourBundle:City:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
			'tours' 	  => $tours,
			));
    }

    /**
     * Displays a form to edit an existing City entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $editForm = $this->createForm(new CityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('chabTestTourBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing City entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('chabTestTourBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CityType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('city_edit', array('id' => $id)));
        }

        return $this->render('chabTestTourBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a City entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('chabTestTourBundle:City')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find City entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('city'));
    }

    /**
     * Creates a form to delete a City entity by id.
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
