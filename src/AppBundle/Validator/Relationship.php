<?php

namespace AppBundle\Validator;


use Symfony\Component\Validator\Constraint;

/**
 * Class Relationship
 * @package AppBundle\Validator
 * @Annotation
 */
class Relationship extends Constraint
{
    public $sameTargetMessage = 'La source et la cible ne peuvent pas être identique';
    public $relationshipAlreadyDefined = 'Une relation entre ces deux élèves existe déjà';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
