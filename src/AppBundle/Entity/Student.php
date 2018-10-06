<?php

namespace AppBundle\Entity;

/**
 * Student
 */
class Student
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * gender: true => male, false => female
     *
     * @var bool
     */
    private $gender;

    /**
     * @var bool
     */
    private $hasGlasses;

    /**
     * @var Grade
     */
    private $grade;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     *
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return bool
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set hasGlasses
     *
     * @param boolean $hasGlasses
     *
     * @return Student
     */
    public function setHasGlasses($hasGlasses)
    {
        $this->hasGlasses = $hasGlasses;

        return $this;
    }

    /**
     * Get hasGlasses
     *
     * @return bool
     */
    public function getHasGlasses()
    {
        return $this->hasGlasses;
    }

    /**
     * Set grade.
     *
     * @param Grade $grade
     * @return $this
     */
    public function setGrade(Grade $grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade.
     *
     * @return Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
}