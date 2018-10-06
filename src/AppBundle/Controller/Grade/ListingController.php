<?php

namespace AppBundle\Controller\Grade;

use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listGradeAction()
    {
        $grades = $this->getDoctrine()->getRepository(Grade::class)->findBy(array(
            'user' => $this->getUser(),
        ));

        return $this->render('@Page/Grade/Listing/list_grade.html.twig', array(
            'grades' => $grades,
        ));
    }
}
