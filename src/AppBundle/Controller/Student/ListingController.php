<?php

namespace AppBundle\Controller\Student;

use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listStudentAction(Grade $grade)
    {
        return $this->render('@Page/Student/Listing/list_student.html.twig', array(
            'students' => $grade->getStudents(),
        ));
    }
}
