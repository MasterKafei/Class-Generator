<?php

namespace AppBundle\Validator;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class RelationshipValidator extends ConstraintValidator
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \AppBundle\Entity\Relationship $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if ($value->getTarget()->getId() === $value->getSource()->getId()) {
            $this->context
                ->buildViolation($constraint->sameTargetMessage)
                ->atPath('target')->addViolation();
        }

        if($value->getId() === null) {
            $sourceTargetRelationship = $this->entityManager
                ->getRepository(\AppBundle\Entity\Relationship::class)
                ->findOneBy(array(
                    'target' => $value->getTarget(),
                    'source' => $value->getSource(),
                ));

            $targetSourceRelationship = $this->entityManager
                ->getRepository(\AppBundle\Entity\Relationship::class)
                ->findOneBy(array(
                    'target' => $value->getSource(),
                    'source' => $value->getTarget(),
                ));

            if (null !== $targetSourceRelationship || null !== $sourceTargetRelationship) {
                $this->context->addViolation($constraint->relationshipAlreadyDefined);
            }
        }
    }
}
