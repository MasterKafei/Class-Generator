<?php

namespace AppBundle\Form\Type\Relationship\Creation;


use AppBundle\Entity\Relationship;
use AppBundle\Entity\Student;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateRelationshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('target', EntityType::class, array(
            'class' => Student::class,
            'choice_label' => function (Student $student) {
                return $student->getFirstName() . ' ' . $student->getLastName();
            },
            'query_builder' => function (EntityRepository $repository) use ($options) {
                return $repository->createQueryBuilder('student')->where(
                    'student.grade = :grade'
                )
                    ->andWhere('NOT student = :source')
                    ->setParameter('grade', $options['source']->getGrade())
                    ->setParameter('source', $options['source']);
            }
        ))
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Favoriser' => Relationship::PROMOTE_TYPE,
                    'Eviter' => Relationship::AVOID_TYPE,
                )
            ))
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Relationship::class,
            'source' => null,
        ));
    }
}
