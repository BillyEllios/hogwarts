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

    #[ORM\ManyToOne(targetEntity: Teachers::class, inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private $teachers;

    #[ORM\OneToMany(mappedBy: 'courses', targetEntity: Test::class)]
    private $tests;

    #[ORM\ManyToMany(targetEntity: Furniture::class, mappedBy: 'courses')]
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTeachers(): ?Teachers
    {
        return $this->teachers;
    }

    public function setTeachers(?Teachers $teachers): self
    {
        $this->teachers = $teachers;

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
            $furniture->addCourse($this);
        }

        return $this;
    }

    public function removeFurniture(Furniture $furniture): self
    {
        if ($this->furniture->removeElement($furniture)) {
            $furniture->removeCourse($this);
        }

        return $this;
    }
}
