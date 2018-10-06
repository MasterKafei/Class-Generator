<?php

namespace AppBundle\Controller\Grade;

use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showGradeAction(Grade $grade)
    {
        return $this->render('@Page/Grade/Showing/show_grade.html.twig', array(
            'grade' => $grade,
        ));
    }
}
