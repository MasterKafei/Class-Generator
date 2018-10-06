<?php

namespace AppBundle\Controller\Student;


use AppBundle\Entity\Grade;
use AppBundle\Entity\Student;
use AppBundle\Form\Type\Student\Creation\CreateStudentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createStudentAction(Request $request, Grade $grade)
    {
        $student = new Student();

        $form = $this->createForm(CreateStudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $student->setGrade($grade);
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            return $this->redirectToRoute('app_student_listing_list_student', array('id' => $grade->getId()));
        }

        return $this->render('@Page/Student/Creation/create_student.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
