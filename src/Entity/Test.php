<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 32)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Students::class, inversedBy: 'tests')]
    #[ORM\JoinColumn(nullable: false)]
    private $students;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'tests')]
    #[ORM\JoinColumn(nullable: false)]
    private $courses;

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

    public function getStudents(): ?Students
    {
        return $this->students;
    }

    public function setStudents(?Students $students): self
    {
        $this->students = $students;

        return $this;
    }

    public function getCourses(): ?Course
    {
        return $this->courses;
    }

    public function setCourses(?Course $courses): self
    {
        $this->courses = $courses;

        return $this;
    }
}
