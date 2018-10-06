<?php

namespace AppBundle\Entity;

use AppBundle\Validator\Relationship as RelationshipConstraint;

/**
 * Relationship
 * @RelationshipConstraint
 */
class Relationship
{
    const AVOID_TYPE = 'AVOID';
    const PROMOTE_TYPE = 'PROMOTE';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Student
     */
    private $source;

    /**
     * @var Student
     */
    private $target;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Relationship
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set source.
     *
     * @param Student $source
     * @return $this
     */
    public function setSource(Student $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return Student
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set target.
     *
     * @param Student $target
     * @return $this
     */
    public function setTarget(Student $target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target.
     *
     * @return Student
     */
    public function getTarget()
    {
        return $this->target;
    }
}