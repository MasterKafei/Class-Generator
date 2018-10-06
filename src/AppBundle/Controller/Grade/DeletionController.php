<?php

namespace AppBundle\Controller\Grade;


use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeletionController extends Controller
{
    public function deleteGradeAction(Grade $grade)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($grade);
        $em->flush();

        return $this->redirectToRoute('app_grade_listing_list_grade');
    }
}
