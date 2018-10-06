<?php

namespace AppBundle\Controller\Relationship;

use AppBundle\Entity\Relationship;
use AppBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listRelationshipAction(Student $student)
    {
        $sourceRelationships = $this->getDoctrine()->getRepository(Relationship::class)->findBy(array(
            'source' => $student,
        ));

        $targetRelationships = $this->getDoctrine()->getRepository(Relationship::class)->findBy(array(
            'target' => $student,
        ));

        return $this->render('@Page/Relationship/Listing/list_relationship.html.twig', array(
            'relationships' => array_merge($sourceRelationships, $targetRelationships),
        ));
    }
}
