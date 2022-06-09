<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: 'courses')]
    private $teacher;

    #[ORM\OneToMany(mappedBy: 'courses', targetEntity: Test::class)]
    private $tests;

    #[ORM\ManyToMany(targetEntity: Student::class, mappedBy: 'students')]
    private $students;

    #[ORM\ManyToMany(targetEntity: FurnitureType::class, mappedBy: 'Courses')]
    private $furnitureTypes;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->furniture = new ArrayCollection();
        $this->students = new ArrayCollection();
        $this->furnitureTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * @return Collection<int, Test>
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->setCourses($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getCourses() === $this) {
                $test->setCourses(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addStudent($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeStudent($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, FurnitureType>
     */
    public function getFurnitureTypes(): Collection
    {
        return $this->furnitureTypes;
    }

    public function addFurnitureType(FurnitureType $furnitureType): self
    {
        if (!$this->furnitureTypes->contains($furnitureType)) {
            $this->furnitureTypes[] = $furnitureType;
            $furnitureType->addCourse($this);
        }

        return $this;
    }

    public function removeFurnitureType(FurnitureType $furnitureType): self
    {
        if ($this->furnitureTypes->removeElement($furnitureType)) {
            $furnitureType->removeCourse($this);
        }

        return $this;
    }
}
