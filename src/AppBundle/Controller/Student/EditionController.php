<?php

namespace AppBundle\Controller\Student;

use AppBundle\Entity\Student;
use AppBundle\Form\Type\Student\Edition\EditStudentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editStudentAction(Request $request, Student $student)
    {
        $form = $this->createForm(EditStudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($student);
           $em->flush();

           return $this->redirectToRoute('app_student_listing_list_student');
        }

        return $this->render('@Page/Student/Edition/edit_student.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
