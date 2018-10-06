<?php

namespace AppBundle\Controller\Relationship;

use AppBundle\Entity\Relationship;
use AppBundle\Form\Type\Relationship\Edition\EditRelationshipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editRelationshipAction(Request $request, Relationship $relationship)
    {
        $form = $this->createForm(EditRelationshipType::class, $relationship, array(
            'source' => $relationship->getSource(),
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($relationship);
            $em->flush();

            return $this->redirectToRoute('app_relationship_listing_list_relationship', array(
                'id' => $relationship->getSource()->getId(),
            ));
        }

        return $this->render('@Page/Relationship/Edition/edit_relationship.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
