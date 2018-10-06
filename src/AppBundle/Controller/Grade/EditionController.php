<?php

namespace AppBundle\Controller\Grade;


use AppBundle\Entity\Grade;
use AppBundle\Form\Type\Grade\Edition\EditGradeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editGradeAction(Request $request, Grade $grade)
    {
        $form = $this->createForm(EditGradeType::class, $grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($grade);
           $em->flush();

           return $this->redirectToRoute('app_grade_listing_list_grade');
        }

        return $this->render('@Page/Grade/Edition/edit_grade.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
