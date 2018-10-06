<?php

namespace AppBundle\Controller\Relationship;


use AppBundle\Entity\Relationship;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeletionController extends Controller
{
    public function deleteRelationshipAction(Relationship $relationship)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($relationship);
        $em->flush();

        return $this->redirectToRoute('app_relationship_listing_list_relationship', array(
            'id' => $relationship->getSource()->getId(),
        ));
    }
}
