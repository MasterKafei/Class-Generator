<?php

namespace AppBundle\Controller\Grade;

use AppBundle\Entity\Grade;
use AppBundle\Form\Type\Grade\Creation\CreateGradeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createGradeAction(Request $request)
    {
        $grade = new Grade();

        $form = $this->createForm(CreateGradeType::class, $grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            return $this->redirectToRoute('app_grade_listing_list_grade');
        }

        return $this->render('@Page/Grade/Creation/create_grade.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
