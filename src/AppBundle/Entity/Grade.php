<?php

namespace AppBundle\Entity;

/**
 * Grade
 */
class Grade
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Student[]
     */
    private $students;

    /**
     * @var User
     */
    private $user;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Grade
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get students.
     *
     * @return Student[]
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set students.
     *
     * @param $students
     * @return Grade
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Add student.
     *
     * @param Student $student
     * @return Grade
     */
    public function addStudent(Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Set user.
     *
     * @param User $user
     * @return Grade
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}

