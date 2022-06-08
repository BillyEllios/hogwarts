<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
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
}
