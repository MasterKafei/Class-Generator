<?php

namespace AppBundle\Controller\Student;


use AppBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showStudentAction(Student $student)
    {
        return $this->render('@Page/Student/Showing/show_student.html.twig', array(
            'student' => $student,
        ));
    }
}
