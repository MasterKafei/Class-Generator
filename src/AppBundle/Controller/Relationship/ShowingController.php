<?php

namespace AppBundle\Controller\Relationship;


use AppBundle\Entity\Relationship;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showRelationshipAction(Relationship $relationship)
    {
        return $this->render('@Page/Relationship/Showing/show_relationship.html.twig', array(
            'relationship' => $relationship,
        ));
    }
}
