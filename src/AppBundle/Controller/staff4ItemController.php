<?php

namespace AppBundle\Controller;

use AppBundle\Entity\staff4Item;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Staff4item controller.
 *
 * @Route("allocations")
 */
class staff4ItemController extends Controller
{
    /**
     * Lists all staff4Item entities.
     *
     * @Route("/", name="allocations_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $staff4Items = $em->getRepository('AppBundle:staff4Item')->findAll();

        return $this->render('staff4item/index.html.twig', array(
            'staff4Items' => $staff4Items,
        ));
    }

    /**
     * Creates a new staff4Item entity.
     *
     * @Route("/new", name="allocations_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $staff4Item = new Staff4item();
        $form = $this->createForm('AppBundle\Form\staff4ItemType', $staff4Item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($staff4Item);
            $em->flush($staff4Item);

            return $this->redirectToRoute('allocations_show', array('id' => $staff4Item->getId()));
        }

        return $this->render('staff4item/new.html.twig', array(
            'staff4Item' => $staff4Item,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a staff4Item entity.
     *
     * @Route("/{id}", name="allocations_show")
     * @Method("GET")
     */
    public function showAction(staff4Item $staff4Item)
    {
        $deleteForm = $this->createDeleteForm($staff4Item);

        return $this->render('staff4item/show.html.twig', array(
            'staff4Item' => $staff4Item,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing staff4Item entity.
     *
     * @Route("/{id}/edit", name="allocations_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, staff4Item $staff4Item)
    {
        $deleteForm = $this->createDeleteForm($staff4Item);
        $editForm = $this->createForm('AppBundle\Form\staff4ItemType', $staff4Item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('allocations_edit', array('id' => $staff4Item->getId()));
        }

        return $this->render('staff4item/edit.html.twig', array(
            'staff4Item' => $staff4Item,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a staff4Item entity.
     *
     * @Route("/{id}", name="allocations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, staff4Item $staff4Item)
    {
        $form = $this->createDeleteForm($staff4Item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($staff4Item);
            $em->flush($staff4Item);
        }

        return $this->redirectToRoute('allocations_index');
    }

    /**
     * Creates a form to delete a staff4Item entity.
     *
     * @param staff4Item $staff4Item The staff4Item entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(staff4Item $staff4Item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('allocations_delete', array('id' => $staff4Item->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
