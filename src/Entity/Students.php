<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
class Students
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

    #[ORM\OneToMany(mappedBy: 'students', targetEntity: Test::class)]
    private $tests;

    #[ORM\OneToMany(mappedBy: 'students', targetEntity: Furniture::class)]
    private $furniture;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->furniture = new ArrayCollection();
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
            $test->setStudents($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getStudents() === $this) {
                $test->setStudents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Furniture>
     */
    public function getFurniture(): Collection
    {
        return $this->furniture;
    }

    public function addFurniture(Furniture $furniture): self
    {
        if (!$this->furniture->contains($furniture)) {
            $this->furniture[] = $furniture;
            $furniture->setStudents($this);
        }

        return $this;
    }

    public function removeFurniture(Furniture $furniture): self
    {
        if ($this->furniture->removeElement($furniture)) {
            // set the owning side to null (unless already changed)
            if ($furniture->getStudents() === $this) {
                $furniture->setStudents(null);
            }
        }

        return $this;
    }
}
