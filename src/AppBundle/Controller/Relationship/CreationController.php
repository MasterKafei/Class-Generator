<?php

namespace AppBundle\Controller\Relationship;


use AppBundle\Entity\Relationship;
use AppBundle\Entity\Student;
use AppBundle\Form\Type\Relationship\Creation\CreateRelationshipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createRelationshipAction(Request $request, Student $source)
    {
        $relationship = new Relationship();
        $relationship->setSource($source);

        $form = $this->createForm(CreateRelationshipType::class, $relationship, array(
            'source' => $source,
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $relationship->setSource($source);
            $em = $this->getDoctrine()->getManager();
            $em->persist($relationship);
            $em->flush();

            return $this->redirectToRoute('app_relationship_listing_list_relationship', array(
                'id' => $source->getId(),
            ));
        }

        return $this->render('@Page/Relationship/Creation/create_relationship.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
