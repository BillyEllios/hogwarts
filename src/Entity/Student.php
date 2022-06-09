<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $student_fname;

    #[ORM\Column(type: 'string', length: 255)]
    private $student_lname;

    #[ORM\Column(type: 'date')]
    private $student_birth;

    #[ORM\Column(type: 'string', length: 255)]
    private $student_phone;

    #[ORM\ManyToOne(targetEntity: House::class, inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private $house;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Test::class)]
    private $tests;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Furniture::class)]
    private $furnitures;

    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private $students;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->furnitures = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->student_fname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentFname(): ?string
    {
        return $this->student_fname;
    }

    public function setStudentFname(string $student_fname): self
    {
        $this->student_fname = $student_fname;

        return $this;
    }

    public function getStudentLname(): ?string
    {
        return $this->student_lname;
    }

    public function setStudentLname(string $student_lname): self
    {
        $this->student_lname = $student_lname;

        return $this;
    }

    public function getStudentBirth(): ?\DateTimeInterface
    {
        return $this->student_birth;
    }

    public function setStudentBirth(\DateTimeInterface $student_birth): self
    {
        $this->student_birth = $student_birth;

        return $this;
    }

    public function getStudentPhone(): ?string
    {
        return $this->student_phone;
    }

    public function setStudentPhone(string $student_phone): self
    {
        $this->student_phone = $student_phone;

        return $this;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

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
            $test->setStudent($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getStudent() === $this) {
                $test->setStudent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Furniture>
     */
    public function getFurnitures(): Collection
    {
        return $this->furnitures;
    }

    public function addFurniture(Furniture $furniture): self
    {
        if (!$this->furniture->contains($furniture)) {
            $this->furnitures[] = $furniture;
            $furniture->setStudent($this);
        }

        return $this;
    }

    public function removeFurniture(Furniture $furniture): self
    {
        if ($this->furnitures->removeElement($furniture)) {
            // set the owning side to null (unless already changed)
            if ($furniture->getStudent() === $this) {
                $furniture->setStudent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Course $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
        }

        return $this;
    }

    public function removeStudent(Course $student): self
    {
        $this->students->removeElement($student);

        return $this;
    }
}
